<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Settings_MailConverter_Module_Model extends Settings_Vtiger_Module_Model {
	var $name = 'MailConverter';

	/**
	 * Function to get Create record url
	 * @return <String> Url
	 */
	public function getCreateRecordUrl() {
		$url = 'index.php?module=MailConverter&parent='.$this->getParentName().'&action=CheckMailBoxMaxLimit';
		return 'javascript:Settings_MailConverter_List_Js.checkMailBoxMaxLimit("'.$url.'")';
	}

	/**
	 * Function to get List of fields for mail converter record
	 * @return <Array> List of fields
	 */
	public function getFields() {
		$fields =  array(
                'scannername' => array('name' => 'scannername','typeofdata'=>'V~M','label'=>'Scanner Name','datatype'=>'string'), 
                'server'      => array('name' => 'server','typeofdata'=>'V~M','label'=>'Server','datatype'=>'string'), 
                'username'    => array('name' => 'username','typeofdata'=>'V~M','label'=>'User Name','datatype'=>'string') , 
                'password'    => array('name' => 'password','typeofdata'=>'V~M','label'=>'Password','datatype'=>'password') , 
                'protocol'    => array('name' => 'protocol','typeofdata'=>'C~O','label'=>'Protocol','datatype'=>'radio') ,                 
                'ssltype'     => array('name' => 'ssltype','typeofdata'=>'C~O','label'=>'SSL Type','datatype'=>'radio') ,  
                'sslmethod'   => array('name' => 'sslmethod','typeofdata'=>'C~O','label'=>'SSL Method','datatype'=>'radio') , 
                'connecturl'  => array('name' => 'connecturl', 'typeofdata'=>'V~O','label' => 'Connect URL','datatype' => 'string','isEditable'=>false), 
                'searchfor'   => array('name' => 'searchfor', 'typeofdata'=>'V~O','label'=>'Look For','datatype'=>'picklist'),
                'markas'      => array('name' => 'markas', 'typeofdata'=>'V~O','label'=>'After Scan','datatype'=>'picklist'), 
                'isvalid'     => array('name' => 'isvalid', 'typeofdata'=>'C~O','label'=>'Status','datatype'=>'boolean'),
                'timezone'    => array('name' => 'timezone', 'typeofdata'=>'V~O','label'=>'Time Zone','datatype'=>'picklist'));
        
        $fieldsList = array();
        foreach($fields as $fieldName => $fieldInfo) {
            $fieldModel = new Settings_MailConverter_Field_Model();
            foreach($fieldInfo as $key=>$value) {
                $fieldModel->set($key, $value);
            }
            $fieldsList[$fieldName] = $fieldModel;
        }
        return $fieldsList; 
	}
	
	/**
	 * Function to get the field of setup Rules
	 *  @return <Array> List of setup rule fields
	 */
	
	public function getSetupRuleFiels() {
		$ruleFields =  array(
			 'fromaddress' => array('name' => 'fromaddress','label'=>'LBL_FROM','datatype'=>'email'), 
			'toaddress' => array('name' => 'toaddress','label'=>'LBL_TO','datatype'=>'email'), 
			'subject' => array('name' => 'subject','label'=>'LBL_SUBJECT','datatype'=>'picklist'),
			'body' => array('name' => 'body','label'=>'LBL_BODY','datatype'=>'picklist'),
			'matchusing' => array('name' => 'matchusing','label'=>'LBL_MATCH','datatype'=>'radio'),
			'action' => array('name' => 'action','label'=>'LBL_ACTION','datatype'=>'picklist')
		);	
		$ruleFieldsList = array();
		foreach($ruleFields as $fieldName => $fieldInfo) {
            $fieldModel = new Settings_MailConverter_RuleField_Model();
            foreach($fieldInfo as $key=>$value) {
                $fieldModel->set($key, $value);
            }
            $ruleFieldsList[$fieldName] = $fieldModel;
        }
		return $ruleFieldsList;
	}

	/**
	 * Function to get Default url for this module
	 * @return <String> Url
	 */
	public function getDefaultUrl() {
		return 'index.php?module='. $this->getName() .'&parent='. $this->getParentName() .'&view=List';
	}
    
    public function isPagingSupported(){
        return false;
    }
}
