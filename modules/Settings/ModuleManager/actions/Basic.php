<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
class Settings_ModuleManager_Basic_Action extends Settings_Vtiger_IndexAjax_View {
    function __construct() {
		parent::__construct();
		$this->exposeMethod('updateModuleStatus');
	}
    
    function process(Vtiger_Request $request) {
		$mode = $request->getMode();
		if(!empty($mode)) {
			echo $this->invokeExposedMethod($mode, $request);
			return;
		}
	}
    
    public function updateModuleStatus(Vtiger_Request $request) {
        $moduleName = $request->get('forModule');
        $updateStatus = $request->get('updateStatus');
        
        $moduleManagerModel = new Settings_ModuleManager_Module_Model();
        
        if($updateStatus == 'true') {
            $moduleManagerModel->enableModule($moduleName);
        }else{
            $moduleManagerModel->disableModule($moduleName);
        }
        
        $response = new Vtiger_Response();
		$response->emit();
    }
}
