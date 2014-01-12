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
 * Class that handles all the MailBox folder operations
 */
class MailManager_Folder_View extends MailManager_Abstract_View {

    /**
     * Process the request for Folder opertions
     * @global <type> $list_max_entries_per_page
     * @param Vtiger_Request $request
     * @return MailManager_Response
     */
	function process(Vtiger_Request $request) {
		global $list_max_entries_per_page, $current_user;
		$response = new Vtiger_Response();
        $moduleName = $request->getModule();
		if ('open' == $this->getOperationArg($request)) {
			$q = $request->get('q');
			$foldername = $request->get('_folder');
			$type = $request->get('type');

			$connector = $this->getConnector($foldername);
			$folder = $connector->folderInstance($foldername);
			
			if (empty($q)) {
				$connector->folderMails($folder, intval($request->get('_page', 0)), $list_max_entries_per_page);
			} else {
				if(empty($type)) {
					$type='ALL';
				}
				if($type == 'ON') {
					$dateFormat = $current_user->date_format;
					if ($dateFormat == 'mm-dd-yyyy') {
						$dateArray = explode('-', $q);
						$temp = $dateArray[0];
						$dateArray[0] = $dateArray[1];
						$dateArray[1] = $temp;
						$q = implode('-', $dateArray);
					}
					$query = date('d M Y',strtotime($q));
					$q = ''.$type.' "'.vtlib_purify($query).'"';
				} else {
					$q = ''.$type.' "'.vtlib_purify($q).'"';
				}
				$connector->searchMails($q, $folder, intval($request->get('_page', 0)), $list_max_entries_per_page);
			}
			
			$folderList = $connector->getFolderList();
			
			$viewer = $this->getViewer($request);

			$viewer->assign('TYPE', $type);
			$viewer->assign('QUERY', $request->get('q'));
			$viewer->assign('FOLDER', $folder);
			$viewer->assign('FOLDERLIST',  $folderList);
			$viewer->assign('SEARCHOPTIONS' ,self::getSearchOptions());
			$viewer->assign("JS_DATEFORMAT",parse_calendardate(getTranslatedString('NTC_DATE_FORMAT')));
			$viewer->assign('MODULE', $moduleName);
			$response->setResult( $viewer->view( 'FolderOpen.tpl', $moduleName, true ) );
		} elseif('drafts' == $this->getOperationArg($request)) {
			$q = $request->get('q');
			$type = $request->get('type');
			$page = intval($request->get('_page', 0));

			$connector = $this->getConnector('__vt_drafts');
			$folder = $connector->folderInstance();

			if(empty($q)) {
				$draftMails = $connector->getDrafts($page, $list_max_entries_per_page, $folder);
			} else {
				$draftMails = $connector->searchDraftMails($q, $type, $page, $list_max_entries_per_page, $folder);
			}

			$viewer = $this->getViewer($request);
			$viewer->assign('MAILS', $draftMails);
			$viewer->assign('FOLDER', $folder);
			$viewer->assign('SEARCHOPTIONS' ,MailManager_Draft_View::getSearchOptions());
			$viewer->assign('MODULE', $moduleName);
			$response->setResult($viewer->view('FolderDrafts.tpl', 'MailManager', true));
		}
		return $response;
	}

    /**
     * Returns the List of search string on the MailBox
     * @return string
     */
	static function getSearchOptions(){
		$options = array('SUBJECT'=>'SUBJECT','TO'=>'TO','BODY'=>'BODY','BCC'=>'BCC','CC'=>'CC','FROM'=>'FROM','DATE'=>'ON');
		return $options;
	}
}
?>
