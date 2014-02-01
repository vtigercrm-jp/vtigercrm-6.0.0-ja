<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

/**
 * Class used to control the Mail Manager Settings 
 */
class MailManager_Settings_View extends MailManager_MainUI_View {

    /**
     * Process the request for Settings Operations
     * @param Vtiger_Request $request
     * @return MailManager_Response
     */
	function process(Vtiger_Request $request) {
		$response = new Vtiger_Response();
		$module = $request->getModule();
		if ('edit' == $this->getOperationArg($request)) {
            $model = $this->getMailBoxModel();
			
            $serverName = $model->serverName();
			$viewer = $this->getViewer($request);
            $viewer->assign('MODULE', $module);
			$viewer->assign('MAILBOX', $model);
			$viewer->assign('SERVERNAME', $serverName);
			$response->setResult( $viewer->view( 'Settings.tpl', $module, true ) );
			
		} else if ('save' == $this->getOperationArg($request)) {
			$model = $this->getMailBoxModel();
			$model->setServer($request->get('_mbox_server'));
			$model->setUsername($request->get('_mbox_user'));
			$model->setPassword($request->get('_mbox_pwd'));
			$model->setProtocol($request->get('_mbox_protocol', 'IMAP4'));
			$model->setSSLType($request->get('_mbox_ssltype', 'ssl'));
			$model->setCertValidate($request->get('_mbox_certvalidate', 'novalidate-cert'));
			$model->setRefreshTimeOut($request->get('_mbox_refresh_timeout'));
			$connector = $this->getConnector();
			if ($connector->isConnected()) {
				$model->save();
				
				$request->set('_operation', 'mainui');
				return parent::process($request);
			} else if($connector->hasError()) {
                            $response->isJSON(true);
                            $response->setError( 101, $connector->lastError());
                        }
		} else if ('remove' == $this->getOperationArg($request)) {
			
			$model = $this->getMailBoxModel();
			$model->delete();
			
			$response->isJSON(true);
			$response->setResult( array ('status' => true) );
		}
		
		return $response;
	}
}
?>