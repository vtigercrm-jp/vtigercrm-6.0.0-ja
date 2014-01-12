<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Potentials_FunnelAmount_Dashboard extends Vtiger_IndexAjax_View {

	/**
	 * Function to get the list of Script models to be included
	 * @param Vtiger_Request $request
	 * @return <Array> - List of Vtiger_JsScript_Model instances
	 */
	function getHeaderScripts(Vtiger_Request $request) {

		$jsFileNames = array(
			'~/libraries/jquery/jqplot/plugins/jqplot.barRenderer.min.js',
			'~/libraries/jquery/jqplot/plugins/jqplot.categoryAxisRenderer.min.js',
			'~/libraries/jquery/jqplot/plugins/jqplot.pointLabels.min.js'
		);
		$headerScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		return $headerScriptInstances;
	}
	
	/**
	 * Retrieves css styles that need to loaded in the page
	 * @param Vtiger_Request $request - request model
	 * @return <array> - array of Vtiger_CssScript_Model
	 */
	function getHeaderCss(Vtiger_Request $request){
		$cssFileNames = array(
			//Place your widget specific css files here
		);
		$headerCssScriptInstances = $this->checkAndConvertCssStyles($cssFileNames);
		return $headerCssScriptInstances;
	}

	public function process(Vtiger_Request $request) {
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();

		$linkId = $request->get('linkid');
		
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$data = $moduleModel->getPotentialTotalAmountBySalesStage();

		$widget = Vtiger_Widget_Model::getInstance($linkId, $currentUser->getId());

		$viewer->assign('WIDGET', $widget);
		$viewer->assign('MODULE_NAME', $moduleName);
		$viewer->assign('DATA', $data);

		$viewer->assign('SCRIPTS',$this->getHeaderScripts($request));
		$viewer->assign('STYLES',$this->getHeaderCss($request));
		$viewer->assign('CURRENTUSER', $currentUser);

		$content = $request->get('content');
		if(!empty($content)) {
			$viewer->view('dashboards/DashBoardWidgetContents.tpl', $moduleName);
		} else {
			$viewer->view('dashboards/FunnelAmount.tpl', $moduleName);
		}
	}
}
