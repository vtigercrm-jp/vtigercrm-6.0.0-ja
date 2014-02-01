<?php

/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Settings_MailConverter_ListAjax_View extends Settings_Vtiger_IndexAjax_View {
    
    function __construct() {
        $this->exposeMethod('getMailBoxContentView');
    }
    
    public function getMailBoxContentView(Vtiger_Request $request) {
        $mailBoxId = $request->get('record');
        $recordModel = Settings_MailConverter_Record_Model::getInstanceById($mailBoxId);
        
        $qualifiedModuleName = $request->getModule(false);
        $viewer = $this->getViewer($request);
        $viewer->assign("RECORD_MODELS", array($recordModel));

		$viewer->assign("QUALIFIED_MODULE", $qualifiedModuleName);
        echo $viewer->view("ListViewContents.tpl", $qualifiedModuleName, true);
    }
}