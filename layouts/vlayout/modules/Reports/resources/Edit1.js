/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
Reports_Edit_Js("Reports_Edit1_Js",{},{
	
	relatedModulesMapping  : false,
	step1Container : false,
	secondaryModulesContainer : false,
	
	init : function() {
		this.initialize();
	},
	/**
	 * Function to get the container which holds all the reports step1 elements
	 * @return jQuery object
	 */
	getContainer : function() {
		return this.step1Container;
	},

	/**
	 * Function to set the reports step1 container
	 * @params : element - which represents the reports step1 container
	 * @return : current instance
	 */
	setContainer : function(element) {
		this.step1Container = element;
		return this;
	},
	/*
	 * Function to get the secondary module container 
	 */
	getSecondaryModuleContainer  : function(){
		if(this.secondaryModulesContainer == false){
			this.secondaryModulesContainer = jQuery('#secondary_module'); 
		}
		return this.secondaryModulesContainer;
	},
	
	/**
	 * Function  to intialize the reports step1
	 */
	initialize : function(container) {
		if(typeof container == 'undefined') {
			container = jQuery('#report_step1');
		}
		if(container.is('#report_step1')) {
			this.setContainer(container);
		}else{
			this.setContainer(jQuery('#report_step1'));
		}
		this.intializeOperationMappingDetails();
	},
	/**
	 * Function which will save the related modules mapping
	 */
	intializeOperationMappingDetails : function() {
		this.relatedModulesMapping = jQuery('#relatedModules').data('value');
	},
	
	/**
	 * Function which will return set of condition for the given field type
	 * @return array of conditions
	 */
	getRelatedModulesFromPrimaryModule : function(primaryModule){
		return this.relatedModulesMapping[primaryModule];
	},

	loadRelatedModules : function(primaryModule){
		var relatedModulesMapping = this.getRelatedModulesFromPrimaryModule(primaryModule);
		var options = '';
		for(var key in relatedModulesMapping) {
			//IE Browser consider the prototype properties also, it should consider has own properties only.
			if(relatedModulesMapping.hasOwnProperty(key)) {
				options += '<option value="'+key+'">'+relatedModulesMapping[key]+'</option>';
			}
		}
		var secondaryModulesContainer = this.getSecondaryModuleContainer();
		secondaryModulesContainer.html(options).trigger("change");
		
	},
	registerPrimaryModuleChangeEvent : function(){
		var thisInstance = this;
		jQuery('#primary_module').on('change',function(e){
			var primaryModule = jQuery(e.currentTarget).val();
			thisInstance.loadRelatedModules(primaryModule);
		});
	},
	
	/*
	 * Function to check Duplication of report Name
	 * returns boolean true or false
	 */
	checkDuplicateName : function(details) {
		var aDeferred = jQuery.Deferred();
		var moduleName = app.getModuleName();
		var params = {
			'module' : moduleName,
			'action' : "CheckDuplicate",
			'reportname' : details.reportName,
			'record' : details.reportId,
			'isDuplicate' : details.isDuplicate
		}
		
		AppConnector.request(params).then(
			function(data) {
				var response = data['result'];
				var result = response['success'];
				if(result == true) {
					aDeferred.reject(response);
				} else {
					aDeferred.resolve(response);
				}
			},
			function(error,err){
				aDeferred.reject();
			}
			);
		return aDeferred.promise();
	},
	
	
	submit : function(){
		var thisInstance = this;
		var aDeferred = jQuery.Deferred();
		var form = this.getContainer();
		var formData = form.serializeFormData();
		
		var params = {};
		var reportName = jQuery.trim(formData.reportname);
		var reportId = formData.record;
		
		var progressIndicatorElement = jQuery.progressIndicator({
			'position' : 'html',
			'blockInfo' : {
				'enabled' : true
			}
		});
		
		thisInstance.checkDuplicateName({
			'reportName' : reportName, 
			'reportId' : reportId,
			'isDuplicate' : formData.isDuplicate
		}).then(
			function(data){
				AppConnector.request(formData).then(
					function(data) {
						form.hide();
						progressIndicatorElement.progressIndicator({
							'mode' : 'hide'
						})
						aDeferred.resolve(data);
					},
					function(error,err){

					}
					);
			},
			function(data, err){
				progressIndicatorElement.progressIndicator({
					'mode' : 'hide'
				})
				params = {
					title: app.vtranslate('JS_DUPLICATE_RECORD'),
					text: data['message']
				};
				Vtiger_Helper_Js.showPnotify(params);
				aDeferred.reject();
			}
			);
		return aDeferred.promise();
	},
	
	/**
	 * Function which will register the select2 elements for secondary modules selection
	 */
	registerSelect2ElementForSecondaryModulesSelection : function() {
		var secondaryModulesContainer = this.getSecondaryModuleContainer();
		app.changeSelectElementView(secondaryModulesContainer, 'select2', {maximumSelectionSize: 2});
	},
	
	registerEvents : function(){
		this.registerPrimaryModuleChangeEvent();
		this.registerSelect2ElementForSecondaryModulesSelection();
		var container = this.getContainer();
		
		var opts = app.validationEngineOptions;
		// to prevent the page reload after the validation has completed 
		opts['onValidationComplete'] = function(form,valid) {
            //returns the valid status
            return valid;
        };
		opts['promptPosition'] = "bottomRight";
		container.validationEngine(opts);
	}
});