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
class MailManager_FolderController_Controller extends MailManager_Controller_Controller {

    /**
     * Process the request for Folder opertions
     * @global <type> $list_max_entries_per_page
     * @param MailManager_Request $request
     * @return MailManager_Response
     */
	function process(MailManager_Request $request) {
		global $list_max_entries_per_page, $current_user;
		$response = new Vtiger_Response();
        
		if ('open' == $request->getOperationArg()) {
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
			
			$viewer = $this->getViewer();
			
			$viewer->assign('TYPE', $type);
			$viewer->assign('QUERY', $request->get('q'));
			$viewer->assign('FOLDER', $folder);
			$viewer->assign('FOLDERLIST',  $folderList);
			$viewer->assign('SEARCHOPTIONS' ,self::getSearchOptions());
			$viewer->assign("JS_DATEFORMAT",parse_calendardate(getTranslatedString('NTC_DATE_FORMAT')));
			
			$response->setResult( $viewer->fetch( $this->getModuleTpl( 'FolderOpen.tpl' ) ) );
		} elseif('drafts' == $request->getOperationArg()) {
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

			$viewer = $this->getViewer();
			$viewer->assign('MAILS', $draftMails);
			$viewer->assign('FOLDER', $folder);
			$viewer->assign('SEARCHOPTIONS' ,MailManager_DraftController::getSearchOptions());
			$response->setResult($viewer->fetch($this->getModuleTpl('FolderDrafts.tpl')));
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
