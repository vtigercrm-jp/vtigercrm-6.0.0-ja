<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class PriceBooks_RelationListView_Model extends Vtiger_RelationListView_Model {

	public function getHeaders() {
		$relationModel = $this->getRelationModel();
		$relatedModuleModel = $relationModel->getRelationModuleModel();

		$headerFieldNames = $relatedModuleModel->getRelatedListFields();

		$headerFields = array();
		foreach($headerFieldNames as $fieldName) {
			$headerFields[$fieldName] = $relatedModuleModel->getField($fieldName);
		}

		//Added to support List Price
		$field = new Vtiger_Field_Model();
		$field->set('name', 'listprice');
		$field->set('column', 'listprice');
		$field->set('label', 'List Price');

		array_push($headerFields, $field);

		return $headerFields;
	}

	public function getEntries($pagingModel) {
		$db = PearDatabase::getInstance();
		$parentModule = $this->getParentRecordModel()->getModule();
		$relationModule = $this->getRelationModel()->getRelationModuleModel();
		$relatedColumnFieldMapping = $relationModule->getRelatedListFields();

		$query = $this->getRelationQuery();

		$startIndex = $pagingModel->getStartIndex();
		$pageLimit = $pagingModel->getPageLimit();

		$orderBy = $this->getForSql('orderby');
		$sortOrder = $this->getForSql('sortorder');
		if($orderBy) {
			$query = "$query ORDER BY $orderBy $sortOrder";
		}

		$limitQuery = $query .' LIMIT '.$startIndex.','.$pageLimit;
		$result = $db->pquery($limitQuery, array());
		$relatedRecordList = array();

		for($i=0; $i< $db->num_rows($result); $i++ ) {
			$row = $db->fetch_row($result,$i);
			$newRow = array();
			foreach($row as $col=>$val){
				if(array_key_exists($col,$relatedColumnFieldMapping))
					$newRow[$relatedColumnFieldMapping[$col]] = $val;
			}
			if ($relationModule->getName() === 'Products') {
				$recordId = $row['productid'];
			} else if ($relationModule->getName() === 'Services') {
				$recordId = $row['serviceid'];
			}
			$newRow['id'] = $recordId;
			//Added to support List Price
			$newRow['listprice'] = CurrencyField::convertToUserFormat($row['listprice'], null, true);

			$record = Vtiger_Record_Model::getCleanInstance($relationModule->get('name'));
			$relatedRecordList[$recordId] = $record->setData($newRow)->setModuleFromInstance($relationModule);
		}
		$pagingModel->calculatePageRange($relatedRecordList);

		$nextLimitQuery = $query. ' LIMIT '.($startIndex+$pageLimit).' , 1';
		$nextPageLimitResult = $db->pquery($nextLimitQuery, array());
		if($db->num_rows($nextPageLimitResult) > 0){
			$pagingModel->set('nextPageExists', true);
		}else{
			$pagingModel->set('nextPageExists', false);
		}
		return $relatedRecordList;
	}
}