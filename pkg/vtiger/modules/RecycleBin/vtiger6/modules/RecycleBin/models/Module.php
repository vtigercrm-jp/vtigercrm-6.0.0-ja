<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class RecycleBin_Module_Model extends Vtiger_Module_Model {
	

	/**
	 * Function to get the url for list view of the module
	 * @return <string> - url
	 */
	public function getDefaultUrl() {
		return 'index.php?module='.$this->get('name').'&view='.$this->getListViewName().'&sourceModule=Accounts';
	}
	
	/**
	 * Function to get the list of listview links for the module
	 * @return <Array> - Associate array of Link Type to List of Vtiger_Link_Model instances
	 */
	public function getListViewLinks() {
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$privileges = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		$basicLinks = array();
		if($currentUserModel->isAdminUser() || $privileges->hasModulePermission($this->getId())) {
			$basicLinks = array(
					
					array(
							'linktype' => 'LISTVIEWBASIC',
							'linklabel' => 'LBL_EMPTY_RECYCLEBIN',
							'linkurl' => 'javascript:RecycleBin_List_Js.emptyRecycleBin("index.php?module='.$this->get('name').'&action=RecycleBinAjax")',
							'linkicon' => ''
					)
			);
		}

		foreach($basicLinks as $basicLink) {
			$links['LISTVIEWBASIC'][] = Vtiger_Link_Model::getInstanceFromValues($basicLink);
		}

		return $links;
	}

	/**
	 * Function to get the list of Mass actions for the module
	 * @param <Array> $linkParams
	 * @return <Array> - Associative array of Link type to List of  Vtiger_Link_Model instances for Mass Actions
	 */
	public function getListViewMassActions() {
		$currentUserModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();

		$massActionLinks = array();
		if($currentUserModel->hasModulePermission($this->getId())) {
			$massActionLinks[] = array(
					'linktype' => 'LISTVIEWMASSACTION',
					'linklabel' => 'LBL_DELETE',
					'linkurl' => 'javascript:RecycleBin_List_Js.deleteRecords("index.php?module='.$this->get('name').'&action=RecycleBinAjax")',
					'linkicon' => ''
			);

			$massActionLinks[] = array(
					'linktype' => 'LISTVIEWMASSACTION',
					'linklabel' => 'LBL_RESTORE',
					'linkurl' => 'javascript:RecycleBin_List_Js.restoreRecords("index.php?module='.$this->get('name').'&action=RecycleBinAjax")',
					'linkicon' => ''
			);
		}

		foreach($massActionLinks as $massActionLink) {
			$links[] = Vtiger_Link_Model::getInstanceFromValues($massActionLink);
		}
		
		return $links;
	}

	/**
	 * Function to get the Quick Links for the module
	 * @param <Array> $linkParams
	 * @return <Array> List of Vtiger_Link_Model instances
	 */
	public function getSideBarLinks($linkParams) {
		$linkTypes = array('SIDEBARLINK', 'SIDEBARWIDGET');
		$links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);

		$quickLinks = array(
			array(
				'linktype' => 'SIDEBARLINK',
				'linklabel' => 'LBL_RECORDS_LIST',
				'linkurl' => $this->getDefaultUrl(),
				'linkicon' => '',
			),
		);
		foreach($quickLinks as $quickLink) {
			$links['SIDEBARLINK'][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
		}
		return $links;
	}
	
	/**
	 * Function to get all entity modules
	 * @return <array>
	 */
	public function getAllModuleList(){
		return parent::getEntityModules();
	}
	
	/**
	 * Function to delete the reccords perminently in vitger CRM database
	 */
	public function emptyRecycleBin(){
		$db = PearDatabase::getInstance();

		$db->query('DELETE FROM vtiger_crmentity WHERE deleted = 1');
		$db->query('DELETE FROM vtiger_relatedlists_rb');
		
		return true;
	}
	
	/**
	 * Function to deleted the records perminently in CRM
	 * @param type $reocrdIds
	 */
	public function deleteRecords($recordIds){
		$db = PearDatabase::getInstance();
		//Delete the records in vtiger crmentity and relatedlists.
		$query = 'DELETE FROM vtiger_crmentity WHERE deleted = ? and crmid in('.generateQuestionMarks($recordIds).')';
		$db->pquery($query, array(1, $recordIds));
		
		$query = 'DELETE FROM vtiger_relatedlists_rb WHERE entityid in('.generateQuestionMarks($recordIds).')';
		$db->pquery($query, array($recordIds));
		
		// TODO - Remove records from module tables and other related stores.
	}
	
	/**
	 * Function to restore the deleted records.
	 * @param type $sourceModule
	 * @param type $recordIds
	 */
	public function restore($sourceModule, $recordIds){
		$focus = CRMEntity::getInstance($sourceModule);
		for($i=0;$i<count($recordIds);$i++) {
			if(!empty($recordIds[$i])) {
				$focus->restore($sourceModule, $recordIds[$i]);
			}
		}
	}
}
