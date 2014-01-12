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
 * Class that handles Internal vtiger Drafts
 */
class MailManager_Draft_View extends MailManager_Abstract_View {

    /**
     * Function to process request, currently not used
     * @param Vtiger_Request $request
     */
	function process(Vtiger_Request $request) {
	}

    /**
     * Returns a List of search strings on the internal vtiger Drafts
     * @return Array of vtiger Email Fields
     */
	static function getSearchOptions(){
		$options = array('subject'=>'SUBJECT', 'saved_toid'=>'TO','description'=>'BODY','bccmail'=>'BCC','ccmail'=>'CC');
		return $options;
	}

    /**
     * Function which returns the Draft Model
     * @return MailManager_Draft_Model
     */
	function connectorWithModel() {
		if ($this->mMailboxModel === false) {
			$this->mMailboxModel = MailManager_Draft_Model::getInstance();
		}
		return $this->mMailboxModel;
	}
}
?>