<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Settings_MailConverter_RulesList_View extends Settings_Vtiger_Index_View {

	public function checkPermission(Vtiger_Request $request) {
		parent::checkPermission($request);
		$recordId = $request->get('record');

		if (!$recordId) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED', 'Vtiger'));
		}
	}

	public function process(Vtiger_Request $request) {
		$scannerId = $request->get('record');
		$qualifiedModuleName = $request->getModule(false);
		$moduleName = $request->getModule();

		$viewer = $this->getViewer($request);

		$viewer->assign('SCANNER_ID', $scannerId);
		$viewer->assign('SCANNER_MODEL', Settings_MailConverter_Record_Model::getInstanceById($scannerId));
		$viewer->assign('RULE_MODELS_LIST', Settings_MailConverter_RuleRecord_Model::getAll($scannerId));
		$viewer->assign('MODULE_NAME', $moduleName);
		$viewer->assign('QUALIFIED_MODULE_NAME', $qualifiedModuleName);

		$viewer->view('RulesList.tpl', $qualifiedModuleName);
	}
}