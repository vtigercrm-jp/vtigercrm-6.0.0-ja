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
	'Accounts' => '顧客企業',
	'SINGLE_Accounts' => '顧客企業',
	'LBL_ADD_RECORD' => '顧客企業の追加',
	'LBL_RECORDS_LIST' => '顧客企業の一覧',

 // Blocks
	'LBL_ACCOUNT_INFORMATION' => '顧客企業の詳細',

 // Mass Action
	'LBL_SHOW_ACCOUNT_HIERARCHY' => '顧客企業系列',

 //Field Labels
	'industry' => '業界',
	'Account Name' => '顧客企業名',
	'Account No' => '顧客企業番号',
	'Website' => 'Web サイト',
	'Ticker Symbol' => '証券コード',
	'Member Of' => '親会社',
	'Employees' => '従業員数',
	'Ownership' => '企業形態',
	'SIC Code' => '業種識別 (SIC) コード',
	'Other Email' => '予備電子メール',
	'Other Phone' => '予備電話',
	'Phone' => '主要電話',
	'Email' => '主要電子メール',
 
 //Added for existing picklist entries
 
	'Analyst'=>'アナリスト',
	'Competitor'=>'競合他社',
	'Customer'=>'顧客',
	'Integrator'=>'インテグレータ',
	'Investor'=>'投資家',
	'Press'=>'出版社・報道機関',
	'Prospect'=>'潜在顧客',
	'Reseller'=>'代理店',
	'LBL_START_DATE' => '開始日',
	'LBL_END_DATE' => '終了日',
 
 //Duplication error message
	'LBL_DUPLICATES_EXIST' => '顧客企業名は既に存在します。',
	'LBL_COPY_SHIPPING_ADDRESS' => '発送先住所からコピーする',
	'LBL_COPY_BILLING_ADDRESS' => '請求先住所からコピーする',
);

$jsLanguageStrings = array(
	'LBL_RELATED_RECORD_DELETE_CONFIRMATION' => '削除しますか？',
	'LBL_DELETE_CONFIRMATION' => 'この顧客企業を削除すると、関連する商談と見積りも削除されます。 この顧客企業を削除しますか？',
	'LBL_MASS_DELETE_CONFIRMATION' => 'この顧客企業を削除すると、関連する商談と見積りも削除されます。 選択したレコードを削除しますか？',
	'JS_DUPLICTAE_CREATION_CONFIRMATION' => '顧客企業名は既に存在します。重複したレコードを作成しますか？'
);
