<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
require_once('modules/com_vtiger_workflow/VTEntityCache.inc');
require_once('modules/com_vtiger_workflow/VTWorkflowUtils.php');

class VTUpdateFieldsTask extends VTTask {

	public $executeImmediately = true;

	public function getFieldNames() {
		return array('field_value_mapping');
	}

	public function doTask($entity) {
		global $adb, $current_user, $default_charset;

		$util = new VTWorkflowUtils();
		$util->adminUser();

		$moduleName = $entity->getModuleName();
		$entityId = $entity->getId();
		$recordId = vtws_getIdComponents($entityId);
		$recordId = $recordId[1];

		$moduleHandler = vtws_getModuleHandlerFromName($moduleName, $current_user);
		$handlerMeta = $moduleHandler->getMeta();
		$moduleFields = $handlerMeta->getModuleFields();

		$fieldValueMapping = array();
		if (!empty($this->field_value_mapping)) {
			$fieldValueMapping = Zend_Json::decode($this->field_value_mapping);
		}

		if (!empty($fieldValueMapping) && count($fieldValueMapping) > 0) {
			require_once('data/CRMEntity.php');
			$focus = CRMEntity::getInstance($moduleName);
			$focus->id = $recordId;
			$focus->mode = 'edit';
			$focus->retrieve_entity_info($recordId, $moduleName);
			$focus->clearSingletonSaveFields();

			$util->loggedInUser();
			$focus->column_fields = DataTransform::sanitizeDateFieldsForInsert($focus->column_fields,$handlerMeta);
			$focus->column_fields = DataTransform::sanitizeCurrencyFieldsForInsert($focus->column_fields,$handlerMeta);
			foreach ($fieldValueMapping as $fieldInfo) {
				$fieldName = $fieldInfo['fieldname'];
				$fieldValueType = $fieldInfo['valuetype'];
				$fieldValue = trim($fieldInfo['value']);

				$fieldInstance = $moduleFields[$fieldName];
				
				if ($fieldValueType == 'fieldname') {
					$fieldDataType = $fieldInstance->getFieldDataType();
					$fieldValue = $focus->column_fields[$fieldValue];
					if($fieldDataType == 'date') {
						//Convert the DB Date Time Format to User Date Time Format
						$dateTime = new DateTimeField($fieldValue);
						$fieldValue = $dateTime->getDisplayDateTimeValue();
						
						$date = explode(' ', $fieldValue);
						$fieldValue = $date[0];
					}
				} elseif ($fieldValueType == 'expression') {
					require_once 'modules/com_vtiger_workflow/expression_engine/include.inc';

					$parser = new VTExpressionParser(new VTExpressionSpaceFilter(new VTExpressionTokenizer($fieldValue)));
					$expression = $parser->expression();
					$exprEvaluater = new VTFieldExpressionEvaluater($expression);
					$fieldValue = $exprEvaluater->evaluate($entity);
					$fieldValue = $this->convertValueToUserFormat($fieldInstance, $fieldValue);
				} else {
					if (preg_match('/([^:]+):boolean$/', $fieldValue, $match)) {
						$fieldValue = $match[1];
						if ($fieldValue == 'true') {
							$fieldValue = '1';
						} else {
							$fieldValue = '0';
						}
					}
				}

				if ($fieldInstance->getFieldDataType() === 'owner') {
                    if(!is_numeric($fieldValue)){
                        //If name is given 
                        $userId = getUserId_Ol($fieldValue);
                        $groupId = getGrpId($fieldValue);

                        if ($userId == 0 && $groupId == 0) {
                            $fieldValue = $focus->column_fields[$fieldName];
                        } else {
                            $fieldValue = ($userId == 0) ? $groupId : $userId;
                        }
                    }
				}

				$focus->column_fields[$fieldName] = $fieldValue;
			}

			foreach ($focus->column_fields as $fieldName => $fieldValue) {
				$focus->column_fields[$fieldName] = html_entity_decode($fieldValue, ENT_QUOTES, $default_charset);
			}
			$_REQUEST['file'] = '';
			$_REQUEST['ajxaction'] = '';

			// Added as Mass Edit triggers workflow and date and currency fields are set to user format
			// When saving the information in database saveentity API should convert to database format
			// and save it. But it converts in database format only if that date & currency fields are
			// changed(massedit) other wise they wont be converted thereby changing the values in user
			// format, CRMEntity.php line 474 has the login to check wheather to convert to database format
			$actionName = $_REQUEST['action'];
			$_REQUEST['action'] = '';
			
			// For workflows update field tasks is deleted all the lineitems.
			$focus->isLineItemUpdate = false;
			
			$focus->saveentity($moduleName);

			// Reverting back the action name as there can be some dependencies on this.
			$_REQUEST['action'] = $actionName;
			$util->revertUser();
		}
		$util->revertUser();
	}

	//Function use to convert the field value in to current user format
	public function convertValueToUserFormat($fieldObj, $fieldValue) {
		global $current_user;
		if(!empty ($fieldObj)) {
			// handle the case for Date field
			if($fieldObj->getFieldDataType()=="date") {
				if(!empty($fieldValue)) {
					$dateFieldObj = new DateTimeField($fieldValue);
					$fieldValue = $dateFieldObj->getDisplayDate($current_user);
				}
			}

			// handle the case for currency field
			if($fieldObj->getFieldDataType()=="currency" && !empty($fieldValue)) {
				if($fieldObj->getUIType() == '71') {
					$fieldValue = CurrencyField::convertToUserFormat($fieldValue,$current_user,false);
				} else if($fieldObj->getUIType() == '72') {
					$fieldValue = CurrencyField::convertToUserFormat($fieldValue,$current_user,true);
				}
			}
		}
		return $fieldValue;
	}

}

?>