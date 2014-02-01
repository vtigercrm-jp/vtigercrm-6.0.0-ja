<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Settings_Workflows_Save_Action extends Settings_Vtiger_Basic_Action {

	public function process(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$summary = $request->get('summary');
		$moduleName = $request->get('module_name');
		$conditions = $request->get('conditions');
		$filterSavedInNew = $request->get('filtersavedinnew');
		$executionCondition = $request->get('execution_condition');

		if($recordId) {
			$workflowModel = Settings_Workflows_Record_Model::getInstance($recordId);
		} else {
			$workflowModel = Settings_Workflows_Record_Model::getCleanInstance($moduleName);
		}

		$response = new Vtiger_Response();
		$workflowModel->set('summary', $summary);
		$workflowModel->set('module_name', $moduleName);
		$workflowModel->set('conditions', $conditions);
		$workflowModel->set('execution_condition', $executionCondition);

		// Added to save the condition only when its changed from vtiger6
		if($filterSavedInNew == '6') {
			//Added to change advanced filter condition to workflow
			$workflowModel->transformAdvanceFilterToWorkFlowFilter();
		}
		$workflowModel->set('filtersavedinnew', $filterSavedInNew);
		$workflowModel->save();
		$response->setResult(array('id' => $workflowModel->get('workflow_id')));
		$response->emit();
	}
} 