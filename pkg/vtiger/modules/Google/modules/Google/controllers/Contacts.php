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

class Google_Contacts_Controller extends WSAPP_SynchronizeController {

    /**
     * Returns the connector of the google contacts
     * @return Google_Contacts_Connector
     */
    public function getTargetConnector() {
        $oauthConnector = new Google_Oauth_Connector(Google_Utils_Helper::getCallbackUrl(array('module' => 'Google', 'sourcemodule' => $this->getSourceType()), array('operation' => 'sync')));
        $client = $oauthConnector->getHttpClient($this->getSourceType());
        $connector = new Google_Contacts_Connector($client);
        $connector->setSynchronizeController($this);
        return $connector;
    }

    /**
     * Return the types of snyc 
     * @return type
     */
    public function getSyncType() {
        return WSAPP_SynchronizeController::WSAPP_SYNCHRONIZECONTROLLER_USER_SYNCTYPE;
    }

    /**
     * Returns source type of Controller
     * @return string
     */
    public function getSourceType() {
        return 'Contacts';
    }

}
