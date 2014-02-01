<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */
vimport('~~/modules/WSAPP/synclib/connectors/TargetConnector.php');
vimport('~~/include/Zend/Gdata/Calendar.php');
Class Google_Calendar_Connector extends WSAPP_TargetConnector {

    protected $apiInstance;
    protected $totalRecords;
    protected $maxResults = 100;
    protected $createdRecords;
	

    public function __construct($client) {
        $this->apiInstance = $client;
    }

    public function getName() {
        return 'GoogleCalendar';
    }

    /**
     * Tarsform Google Records to Vtiger Records
     * @param <array> $targetRecords 
     * @return <array> tranformed Google Records
     */
    public function transformToSourceRecord($targetRecords) {
        $entity = array();
        $calendarArray = array();
        foreach ($targetRecords as $googleRecord) {
            if ($googleRecord->getMode() != WSAPP_SyncRecordModel::WSAPP_DELETE_MODE) {
                $user = Users_Record_Model::getCurrentUserModel();
                $entity['assigned_user_id'] = vtws_getWebserviceEntityId('Users', $user->id);
                $entity['subject'] = $googleRecord->getSubject();
                $entity['date_start'] = $googleRecord->getStartDate();
                $entity['location'] = $googleRecord->getWhere();
                $entity['time_start'] = $googleRecord->getStartTimeUTC();
                $entity['due_date'] = $googleRecord->getEndDate();
                $entity['time_end'] = $googleRecord->getEndTimeUTC();
                $entity['eventstatus'] = "Planned";
                $entity['activitytype'] = "Meeting";
                $entity['description'] = $googleRecord->getDescription();
                $entity['duration_hours'] = '00:00';
                if (empty($entity['subject'])) {
                    $entity['subject'] = 'Google Event';
                }
            }
            $calendar = $this->getSynchronizeController()->getSourceRecordModel($entity);

            $calendar = $this->performBasicTransformations($googleRecord, $calendar);
            $calendar = $this->performBasicTransformationsToSourceRecords($calendar, $googleRecord);
            $calendarArray[] = $calendar;
        }

        return $calendarArray;
    }

    /**
     * Pull the events from google
     * @param <object> $SyncState
     * @return <array> google Records
     */
    public function pull($SyncState) {
        return $this->getCalendar($SyncState);
    }

    /**
     * Pull the events from google
     * @param <object> $SyncState
     * @return <array> google Records
     */
    public function getCalendar($SyncState) {
        $calendars = new Zend_Gdata_Calendar($this->apiInstance);
        $query = $calendars->newEventQuery($query);
        $query->setVisibility('private');
        $query->setMaxResults($this->maxResults);
        $query->setStartIndex(1);
        $query->setOrderBy('lastmodified');
        $query->setsortorder('ascending');
        if (Google_Utils_Helper::getSyncTime('Calendar')) {
            $query->setUpdatedMin(Google_Utils_Helper::getSyncTime('Calendar'));
        }
        $feed = $calendars->getCalendarEventFeed($query);

        $this->totalRecords = $feed->totalResults->text;
        $calendarRecords = array();
        if (count($feed->entry) > 0) {
            $maxModifiedTime = date('Y-m-d H:i:s', strtotime(Google_Contacts_Model::vtigerFormat(end($feed->entry)->updated->text)) + 1);
            if ($this->totalRecords > $this->maxResults) {
                if (!Google_Utils_Helper::getSyncTime('Calendar')) {
                    $query->setUpdatedMin(date('Y-m-d H:i:s', strtotime(Google_Contacts_Model::vtigerFormat(end($feed->entry)->updated->text))));
                    $query->setStartIndex($this->maxResults);
                }

                $query->setMaxResults(500);
                $query->setUpdatedMax($maxModifiedTime);
                $extendedFeed = $calendars->getCalendarEventFeed($query);
                $calendarRecords = array_merge($feed->entry, $extendedFeed->entry);
            } else {
                $calendarRecords = $feed->entry;
            }
        }

        $googleRecords = array();
        foreach ($calendarRecords as $i => $calendar) {
            $recordModel = Google_Calendar_Model::getInstanceFromValues(array('entity' => $calendar));
            $deleted = false;
            if (end(explode('.', $calendar->eventstatus->value)) == 'canceled') {
                $deleted = true;
            }
            if (!$deleted) {
                $recordModel->setType($this->getSynchronizeController()->getSourceType())->setMode(WSAPP_SyncRecordModel::WSAPP_UPDATE_MODE);
            } else {
                $recordModel->setType($this->getSynchronizeController()->getSourceType())->setMode(WSAPP_SyncRecordModel::WSAPP_DELETE_MODE);
            }
            $googleRecords[$calendar->id->text] = $recordModel;
        }
        $this->createdRecords = count($googleRecords);
        if (isset($maxModifiedTime)) {
            Google_Utils_Helper::updateSyncTime('Calendar', $maxModifiedTime);
        } else {
            Google_Utils_Helper::updateSyncTime('Calendar');
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
            $gContact = new Zend_Gdata_Calendar($this->apiInstance);
            try {
                if ($record->getMode() == WSAPP_SyncRecordModel::WSAPP_UPDATE_MODE) {
                    $createdEntry = $entity->save(null, null, array('If-Match' => '*'));
                    $record->set('entity', $createdEntry);
                } else if ($record->getMode() == WSAPP_SyncRecordModel::WSAPP_DELETE_MODE) {
                    $createdEntry = $entity->delete();
                    $record->set('entity', $entity);
                } else {
                    $createdEntry = $gContact->insertEvent($entity);
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
     * @param <array> $vtEvents 
     * @return <array> tranformed vtiger Records
     */
    public function transformToTargetRecord($vtEvents) {
        $records = array();
        foreach ($vtEvents as $vtEvent) {
            $gcalendar = new Zend_Gdata_Calendar($this->apiInstance);

            if ($vtEvent->getMode() == WSAPP_SyncRecordModel::WSAPP_UPDATE_MODE || $vtEvent->getMode() == WSAPP_SyncRecordModel::WSAPP_DELETE_MODE) {
                try{
                    $newEntry = $gcalendar->getCalendarEventEntry($vtEvent->get('_id'));
                } catch (Exception $e){
                    continue;
                }
            } else {
                $newEntry = $gcalendar->newEventEntry();
            }
            $newEntry->title = $gcalendar->newTitle($vtEvent->get('subject'));
            $newEntry->where = array($gcalendar->newWhere($vtEvent->get('location')));

            $newEntry->content = $gcalendar->newContent($vtEvent->get('description'));
            $newEntry->content->type = 'text';

            $oldtz = date_default_timezone_get(); 
            date_default_timezone_set('GMT');
            $startDate = $vtEvent->get('date_start');
            $startTime = $vtEvent->get('time_start');
            $endDate = $vtEvent->get('due_date');
            $endTime = $vtEvent->get('time_end');
            if (empty($endTime)) {
                $endTime = "00:00";
            }
            $when = $gcalendar->newWhen();
            $when->startTime = date('c', strtotime("$startDate $startTime"));
            if (!empty($endDate)) {
                $when->endTime = date('c', strtotime("$endDate $endTime"));
            }
            date_default_timezone_set($oldtz);
            $newEntry->when = array($when);
            $recordModel = Google_Calendar_Model::getInstanceFromValues(array('entity' => $newEntry));
            $recordModel->setType($this->getSynchronizeController()->getSourceType())->setMode($vtEvent->getMode())->setSyncIdentificationKey($vtEvent->get('_syncidentificationkey'));
            $recordModel = $this->performBasicTransformations($vtEvent, $recordModel);
            $recordModel = $this->performBasicTransformationsToTargetRecords($recordModel, $vtEvent);
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
?>

