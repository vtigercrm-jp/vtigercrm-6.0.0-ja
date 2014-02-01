<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
vimport('~~/include/Webservices/Custom/DeleteUser.php');

class Users_DeleteAjax_Action extends Vtiger_Delete_Action {

	public function process(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$userId = vtws_getWebserviceEntityId($moduleName, $request->get('userid'));
		$transformUserId = vtws_getWebserviceEntityId($moduleName, $request->get('transfer_user_id'));

		$userModel = Users_Record_Model::getCurrentUserModel();
		$userModuleModel = Users_Module_Model::getInstance($moduleName);
		
		$result = vtws_deleteUser($userId, $transformUserId, $userModel);
		$listViewUrl = $userModuleModel->getListViewUrl();
		
		$response = new Vtiger_Response();
		$response->setResult(array('message'=>vtranslate('LBL_USER_DELETED_SUCCESSFULLY', $moduleName), 'listViewUrl' => $listViewUrl));
		$response->emit();
	}
}
