<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
/*************************************************************************************
 * Description:  Defines the Japanese language pack
 * Contributor(s): 
 *    vtiger CRM Japanese project (http://forge.vtiger.com/projects/japaneselang/),
 *    h.hokawa <hhokawa @nospam@ gmail.com>,
 *    fan site - http://www.vtigercrm.jp, toshi, hime etc.
 * License: MPL1.1.
 * All Rights Reserved.
 *************************************************************************************/

$languageStrings = array(
 // Basic Strings
	'Leads' => '見込み客',
	'SINGLE_Leads' => '見込み客',
	'LBL_RECORDS_LIST' => '見込み客の一覧',
	'LBL_ADD_RECORD' => '見込み客の追加',

 // Blocks
	'LBL_LEAD_INFORMATION' => '見込み客の詳細',

 //Field Labels
	'Lead No' => '見込み客番号',
	'Company' => '会社名',
	'Designation' => '肩書',
	'Website' => 'Web サイト',
	'Industry' => '業界',
	'Lead Status' => '見込み客ステータス',
	'No Of Employees' => '従業員数',
	'Phone' => '主要電話',
	'Secondary Email' => '予備電子メール',
	'Email' => '主要電子メール',

 //Added for Existing Picklist Entries

	'--None--'=>'--なし--',
	'Mr.'=>'Mr. (男性)',
	'Ms.'=>'Ms. (女性)',
	'Mrs.'=>'Mrs.',
	'Dr.'=>'Dr.',
	'Prof.'=>'Prof.',

 //Lead Status Picklist values
	'Attempted to Contact'=>'接触試み中',
	'Cold'=>'低有望度 (Cold)',
	'Contact in Future'=>'将来接触予定',
	'Contacted'=>'接触済み',
	'Hot'=>'高有望度 (Hot)',
	'Junk Lead'=>'価値なし',
	'Lost Lead'=>'消失',
	'Not Contacted'=>'未接触',
	'Pre Qualified'=>'事前審査通過',
	'Qualified'=>'審査通過',
	'Warm'=>'中有望度 (Warm)',

 // Mass Action
	'LBL_CONVERT_LEAD' => '顧客へ昇格',

 //Convert Lead
	'LBL_TRANSFER_RELATED_RECORD' => '関連レコードを転送：',
	'LBL_CONVERT_LEAD_ERROR' => '見込み客を昇格するには、顧客企業または顧客担当者を有効にする必要があります',
	'LBL_CONVERT_LEAD_ERROR_TITLE' => 'モジュール無効',
	'CANNOT_CONVERT' => '昇格できません',
	'LBL_FOLLOWING_ARE_POSSIBLE_REASONS' => '予想される原因：',
	'LBL_LEADS_FIELD_MAPPING_INCOMPLETE' => '見込み客のフィールド マッピングが不完全です (システム設定 > モジュール マネージャ > 見込み客 > 見込み客のフィールド マッピング)',
	'LBL_MANDATORY_FIELDS_ARE_EMPTY' => '必須フィールドが空です',
	'LBL_LEADS_FIELD_MAPPING' => '見込み客のフィールド マッピング',

 //Leads Custom Field Mapping
	'LBL_CUSTOM_FIELD_MAPPING'=> 'フィールド マッピングの編集',
	'LBL_WEBFORMS' => 'Webform のセットアップ',
);
$jsLanguageStrings = array(
	'JS_SELECT_CONTACTS' => '顧客担当者を選択して続行',
	'JS_SELECT_ORGANIZATION' => '顧客企業を選択して続行',
	'JS_SELECT_ORGANIZATION_OR_CONTACT_TO_CONVERT_LEAD' => '昇格には顧客企業または顧客担当者の選択が必要です'
);
