<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
chdir(dirname(__FILE__)."/../../../");
include_once "include/utils/VtlibUtils.php";
include_once "include/utils/CommonUtils.php";
include_once "includes/Loader.php";
include_once 'includes/runtime/BaseModel.php';
include_once 'includes/runtime/Viewer.php';
include_once "includes/http/Request.php";
include_once "include/Webservices/Custom/ChangePassword.php";
include_once "include/Webservices/Utils.php";

class Users_ForgotPassword_Action {

	public function changePassword($request){

		$request = new Vtiger_Request($request);
        $viewer = Vtiger_Viewer::getInstance();
		$username = $request->get('username');
		$newPassword = $request->get('password');
		$confirmPassword = $request->get('confirmPassword');

		$userId = getUserId_Ol($username);
		$user = Users::getActiveAdminUser();
		$wsUserId = vtws_getWebserviceEntityId('Users', $userId);
		vtws_changePassword($wsUserId, '', $newPassword, $confirmPassword, $user);

		$viewer->assign('USERNAME', $username);
		$viewer->assign('PASSWORD', $newPassword);
		$viewer->view('FPLogin.tpl', 'Users');
	}

	public static function run($request){
		$instance = new self();
		$instance->changePassword($request);
	}
}

Users_ForgotPassword_Action::run($_REQUEST);
