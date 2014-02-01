<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */
vimport('~~/modules/WSAPP/synclib/controllers/SynchronizeController.php');

class Google_Calendar_Controller  extends WSAPP_SynchronizeController{
    public function getTargetConnector() {
        $oauthConnector = new Google_Oauth_Connector(Google_Utils_Helper::getCallbackUrl(array('module'=>'Google','sourcemodule'=>'Calendar'), array('operation' => 'sync')));
        $client = $oauthConnector->getHttpClient('Calendar');
        $connector =  new Google_Calendar_Connector($client);
        $connector->setSynchronizeController($this);
        return $connector;
    }
    
    public function getSyncType() {
        return WSAPP_SynchronizeController::WSAPP_SYNCHRONIZECONTROLLER_USER_SYNCTYPE;
    }
    
    public function getSourceType() {
        return 'Events';
    }
}
