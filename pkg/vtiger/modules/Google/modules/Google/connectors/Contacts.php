<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */
require_once 'Zend/Gdata/Contacts.php';
vimport('~~/modules/WSAPP/synclib/connectors/TargetConnector.php');
vimport('~~/include/Zend/Gdata/Contacts.php');

Class Google_Contacts_Connector extends WSAPP_TargetConnector {

	protected $apiInstance;
	protected $totalRecords;
	protected $createdRecords;
	protected $maxResults = 100;

	public function __construct($client) {
		$this->apiInstance = $client;
	}

	/**
	 * Get the name of the Google Connector
	 * @return string
	 */
	public function getName() {
		return 'GoogleContacts';
	}

	/**
	 * Tarsform Google Records to Vtiger Records
	 * @param <array> $targetRecords 
	 * @return <array> tranformed Google Records
	 */
	public function transformToSourceRecord($targetRecords) {
		$entity = array();
		$contacts = array();
		foreach ($targetRecords as $googleRecord) {
			if ($googleRecord->getMode() != WSAPP_SyncRecordModel::WSAPP_DELETE_MODE) {

				$user = Users_Record_Model::getCurrentUserModel();
				$entity['assigned_user_id'] = vtws_getWebserviceEntityId('Users', $user->id);
				$entity['lastname'] = $googleRecord->getLastName();
				$entity['firstname'] = $googleRecord->getFirstName();
				$emails = $googleRecord->getEmails();
				$entity['email'] = $emails[0];
				$phones = $googleRecord->getPhones();
				$entity['mobile'] = $phones[0];
				$addresses = $googleRecord->getAddresses();
				$entity['mailingstreet'] = $addresses[0];

				if (empty($entity['lastname'])) {
					if (!empty($entity['firstname'])) {
						$entity['lastname'] = $entity['firstname'];
					} else if (empty($entity['firstname']) && !empty($entity['email'])) {
						$entity['lastname'] = $entity['email'];
					} else if (!empty($entity['mobile']) || !empty($entity['mailingstreet'])) {
						$entity['lastname'] = 'Google Contact';
					} else {
						continue;
					}
				}
			}
			$contact = $this->getSynchronizeController()->getSourceRecordModel($entity);

			$contact = $this->performBasicTransformations($googleRecord, $contact);
			$contact = $this->performBasicTransformationsToSourceRecords($contact, $googleRecord);
			$contacts[] = $contact;
		}
		return $contacts;
	}

	/**
	 * Pull the contacts from google
	 * @param <object> $SyncState
	 * @return <array> google Records
	 */
	public function pull($SyncState) {
		return $this->getContacts($SyncState);
	}

	/**
	 * Pull the contacts from google
	 * @param <object> $SyncState
	 * @return <array> google Records
	 */
	public function getContacts($SyncState) {
		$contacts = new Zend_Gdata_Contacts($this->apiInstance);
		$query = $contacts->newQuery();
		$query->setMaxResults($this->maxResults);
		$query->setStartIndex(1);
		$query->setOrderBy('lastmodified');
		$query->setsortorder('ascending');
		if (Google_Utils_Helper::getSyncTime('Contacts')) {
			$query->setUpdatedMin(Google_Utils_Helper::getSyncTime('Contacts'));
			$query->setShowDeleted("true");
		}

		$feed = $contacts->getContactListFeed($query);
		$this->totalRecords = $feed->totalResults->text;
		$contactRecords = array();
		if (count($feed->entry) > 0) {
			$maxModifiedTime = date('Y-m-d H:i:s', strtotime(Google_Contacts_Model::vtigerFormat(end($feed->entry)->updated->text)) + 1);
			if ($this->totalRecords > $this->maxResults) {
				if (!Google_Utils_Helper::getSyncTime('Contacts')) {
					$query->setUpdatedMin(date('Y-m-d H:i:s', strtotime(Google_Contacts_Model::vtigerFormat(end($feed->entry)->updated->text))));
					$query->setStartIndex($this->maxResults);
				}
				$query->setMaxResults(5000);
				$query->setUpdatedMax($maxModifiedTime);
				$extendedFeed = $contacts->getContactListFeed($query);
				$contactRecords = array_merge($feed->entry, $extendedFeed->entry);
			} else {
				$contactRecords = $feed->entry;
			}
		}



		$googleRecords = array();
		foreach ($contactRecords as $i => $contact) {
			$recordModel = Google_Contacts_Model::getInstanceFromValues(array('entity' => $contact));
			$deleted = false;
			foreach ($contact->getextensionElements() as $extentionElement) {
				if ($extentionElement->rootElement == 'deleted') {
					$deleted = true;
				}
			}
			if (!$deleted) {
				$recordModel->setType($this->getSynchronizeController()->getSourceType())->setMode(WSAPP_SyncRecordModel::WSAPP_UPDATE_MODE);
			} else {
				$recordModel->setType($this->getSynchronizeController()->getSourceType())->setMode(WSAPP_SyncRecordModel::WSAPP_DELETE_MODE);
			}
			$googleRecords[$contact->id->text] = $recordModel;
		}
		$this->createdRecords = count($googleRecords);
		if (isset($maxModifiedTime)) {
			Google_Utils_Helper::updateSyncTime('Contacts', $maxModifiedTime);
		} else {
			Google_Utils_Helper::updateSyncTime('Contacts');
		}

		return $googleRecords;
	}

	/**
	 * Push the vtiger records to google
	 * @param <array> $records vtiger records to be pushed to google
	 * @return <array> pushed records
	 */
	public function push($records) {
		foreach ($records as $record) {
			$entity = $record->get('entity');
			$gContact = new Zend_Gdata_Contacts($this->apiInstance);
			try {
				if ($record->getMode() == WSAPP_SyncRecordModel::WSAPP_UPDATE_MODE) {
					$createdEntry = $entity->save(null, null, array('If-Match' => '*'));
					$record->set('entity', $createdEntry);
				} else if ($record->getMode() == WSAPP_SyncRecordModel::WSAPP_DELETE_MODE) {
					$createdEntry = $entity->delete();
					$record->set('entity', $entity);
				} else {
					$createdEntry = $gContact->insertContact($entity);
					$record->set('entity', $createdEntry);
				}
			} catch (Exception $e) {
				continue;
			}
		}
		return $records;
	}

	/**
	 * Tarsform  Vtiger Records to Google Records
	 * @param <array> $vtContacts 
	 * @return <array> tranformed vtiger Records
	 */
	public function transformToTargetRecord($vtContacts) {
		$records = array();
		foreach ($vtContacts as $vtContact) {
			$gdataContact = new Zend_Gdata_Contacts($this->apiInstance);
			if ($vtContact->getMode() == WSAPP_SyncRecordModel::WSAPP_UPDATE_MODE || $vtContact->getMode() == WSAPP_SyncRecordModel::WSAPP_DELETE_MODE) {
				try {
					$entry = $gdataContact->getContactListEntry($vtContact->get('_id'));
				} catch (Exception $e) {
					continue;
				}
			} else {
				$entry = $gdataContact->newContactEntry();
			}
			$entry->name = $gdataContact->newName($vtContact->get('firstname') . " " . $vtContact->get('lastname'));
			$primaryEmail = $gdataContact->newEmail($vtContact->get('email'));
			$addressArray = array();
			$mailingstreet = $vtContact->get('mailingstreet');
			if (!empty($mailingstreet)) {
				$postalAddress = $gdataContact->newStructuredPostalAddress("Postal Address");
				$postalAddress->street = $gdataContact->newStreet(implode(' ', array($vtContact->get('mailingstreet'), $vtContact->get('mailingcity'), $vtContact->get('mailingstate'), $vtContact->get('mailingcountry'))));
				$addressArray[] = $postalAddress;
			}

			$phoneArray = array();
			$phone = $vtContact->get('mobile');
			if (!empty($phone)) {
				$phoneArray[] = $gdataContact->newPhoneNumber($phone);
			}
			$entry->emails = array($primaryEmail);
			$entry->phones = $phoneArray;
			$entry->addresses = $addressArray;
			$recordModel = Google_Contacts_Model::getInstanceFromValues(array('entity' => $entry));
			$recordModel->setType($this->getSynchronizeController()->getSourceType())->setMode($vtContact->getMode())->setSyncIdentificationKey($vtContact->get('_syncidentificationkey'));
			$recordModel = $this->performBasicTransformations($vtContact, $recordModel);
			$recordModel = $this->performBasicTransformationsToTargetRecords($recordModel, $vtContact);
			$records[] = $recordModel;
		}
		return $records;
	}

	/**
	 * returns if more records exits or not
	 * @return <boolean> true or false
	 */
	public function moreRecordsExits() {
		return ($this->totalRecords - $this->createdRecords > 0) ? true : false;
	}

}
