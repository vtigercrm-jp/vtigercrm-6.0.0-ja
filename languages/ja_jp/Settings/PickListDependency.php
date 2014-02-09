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
	'LBL_ADD_RECORD' => '定義リスト依存関係の追加',
	'LBL_PICKLIST_DEPENDENCY' => '定義リスト依存関係',
	'LBL_SELECT_MODULE' => 'モジュール',
	'LBL_SOURCE_FIELD' => '依存元フィールド',
	'LBL_TARGET_FIELD' => '依存先フィールド',
	'LBL_SELECT_FIELD' => 'フィールドの選択',
	'LBL_CONFIGURE_DEPENDENCY_INFO' => '各セルをクリックして、依存先フィールドの定義リスト マッピングを変更します。',
	'LBL_CONFIGURE_DEPENDENCY_HELP_1' => '依存元フィールドのマッピングされた定義リスト値のみが以下に表示されます (初回を除く)',
 'LBL_CONFIGURE_DEPENDENCY_HELP_2' => "If you want to see or change the mapping for the other picklist values of Source field, <br/>
          then you can select the values by clicking on <b>'Select Source values'</b> button on the right side",
	'LBL_CONFIGURE_DEPENDENCY_HELP_3' => '選択した依存先フィールド値は次のようにハイライトされます： ',
	'LBL_SELECT_SOURCE_VALUES' => '依存元値の選択',
	'LBL_SELECT_SOURCE_PICKLIST_VALUES' => '依存元の定義リスト値の選択',
	'LBL_ERR_CYCLIC_DEPENDENCY' => '循環依存関係が存在するため、この依存関係の設定は行えません',
);

$jsLanguageStrings = array(
	'JS_LBL_ARE_YOU_SURE_YOU_WANT_TO_DELETE' => 'この定義リスト依存関係を削除しますか？',
	'JS_DEPENDENCY_DELETED_SUEESSFULLY' => '依存関係が正しく削除されました',
	'JS_PICKLIST_DEPENDENCY_SAVED' => '定義リスト依存関係が保存されました',
    'JS_DEPENDENCY_ATLEAST_ONE_VALUE' => '少なくとも 1 つの値を選択する必要があります： ',
	'JS_SOURCE_AND_TARGET_FIELDS_SHOULD_NOT_BE_SAME' => '依存元フィールドと依存先フィールドは異なる必要があります',
	'JS_SELECT_SOME_VALUE' => '値を選択してください'
);
