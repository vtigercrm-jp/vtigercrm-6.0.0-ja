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
	'LayoutEditor' => 'レイアウト エディタ',
	'LBL_FIELDS_AND_LAYOUT_EDITOR' => 'フィールドとレイアウトのエディタ',
	'LBL_CREATE_CUSTOM_FIELD' => 'カスタム フィールドの作成',
	'LBL_DETAILVIEW_LAYOUT' => '詳細表示のレイアウト',
	'LBL_ARRANGE_RELATED_TABS' => '関連タブの配置',
	'LBL_ADD_CUSTOM_FIELD' => 'カスタム フィールドの追加',
	'LBL_ADD_CUSTOM_BLOCK' => 'カスタム ブロックの追加',
	'LBL_SAVE_FIELD_SEQUENCE' => 'フィールド順の保存',
	'LBL_BLOCK_NAME' => 'ブロック名',
	'LBL_ADD_AFTER' => '下に追加',
	'LBL_ACTIONS' => '操作',
	'LBL_ALWAYS_SHOW' => '常に表示',
	'LBL_INACTIVE_FIELDS' => '無効なフィールド',
	'LBL_DELETE_CUSTOM_BLOCK' => 'カスタム ブロックの削除',
	'LBL_MANDATORY_FIELD' => '必須フィールド',
	'LBL_ACTIVE' => '有効',
	'LBL_QUICK_CREATE' => 'クイック作成',
	'LBL_SUMMARY_FIELD' => '概要表示',
	'LBL_MASS_EDIT' => '一括編集',
	'LBL_DEFAULT_VALUE' => 'デフォルト値',
	'LBL_SELECT_FIELD_TYPE' => 'フィールド タイプの選択',
	'LBL_LABEL_NAME' => 'ラベル名',
	'LBL_LENGTH' => '長さ',
	'LBL_DECIMALS' => '少数点',
	'LBL_ENTER_PICKLIST_VALUES' => '定義リストの値を入力...',
	'LBL_PICKLIST_VALUES' => '定義リストの値',
	'LBL_INACTIVE_FIELDS' => '無効なフィールド',
	'LBL_REACTIVATE' => '再有効化',
	'LBL_ARRANGE_RELATED_LIST' => '関連一覧の配置',
	'LBL_SELECT_MODULE_TO_ADD' => '追加するモジュールの選択',
	'LBL_NO_RELATED_INFORMATION' => '関連情報がありません',
	'LBL_RELATED_LIST_INFO' => 'ドラッグ アンド ドロップで一覧の順番を変更します',
	'LBL_REMOVE_INFO' => '閉じるアイコンをクリックして一覧からモジュールを削除します',
	'LBL_ADD_MODULE_INFO' => '削除したモジュールから選択して一覧に戻します',
	'LBL_SELECT_MODULE' => 'モジュールの選択...',
	'LBL_DUPLICATES_EXIST' => 'ブロック名は既に存在します。',
	'LBL_NON_ROLE_BASED_PICKLIST' => '役割に基づいた定義リストがありません',
	'LBL_DUPLICATE_FIELD_EXISTS' => '重複フィールドが存在します',
	'LBL_WRONG_FIELD_TYPE' => '不正なフィールド タイプです',
	'LBL_ROLE_BASED_PICKLIST' => '役割に基づいた定義リスト',
	'LBL_CLICK_HERE_TO_EDIT' => 'ここをクリックして編集',

 //Field Types
	'Text'=>'テキスト',
	'Decimal'=>'少数付き数値',
	'Integer'=>'整数',
	'Percent'=>'パーセント',
	'Currency'=>'通貨',
	'Date'=>'日付',
	'Email'=>'電子メール',
	'Phone'=>'電話',
	'PickList'=>'定義リスト',
	'MultiSelectCombo'=>'複数選択コンボ ボックス',
	'URL' => 'URL',
	'Checkbox' => 'チェックボックス',
	'TextArea' => 'テキスト エリア',
	'Skype'=>'Skype',
	'Time'=>'時刻',
);

$jsLanguageStrings = array(
	'JS_BLOCK_VISIBILITY_SHOW' => 'ブロック表示の有効',
	'JS_BLOCK_VISIBILITY_HIDE' => 'ブロック非表示の有効',
	'JS_CUSTOM_BLOCK_ADDED' => '新規カスタム ブロックの追加',
	'JS_BLOCK_SEQUENCE_UPDATED' => 'ブロック順序の更新',
	'JS_SELECTED_FIELDS_REACTIVATED' => '選択したフィールドが再有効化',
	'JS_FIELD_DETAILS_SAVED' => 'フィールド詳細の保存',
	'JS_CUSTOM_BLOCK_DELETED' => 'カスタム ブロックの削除',
	'JS_CUSTOM_FIELD_ADDED' => '新規カスタム フィールドの追加',
	'JS_CUSTOM_FIELD_DELETED' => 'カスタム フィールドの削除',
	'JS_LENGTH_SHOULD_BE_LESS_THAN_EQUAL_TO' => '長さは次の値以下である必要があります：',
	'JS_PLEASE_ENTER_NUMBER_IN_RANGE_2TO5' => '小数点は 2 から 5 の範囲にしてください',
	'JS_SAVE_THE_CHANGES_TO_UPDATE_FIELD_SEQUENCE' => '変更を保存してフィールド順を更新します',
	'JS_RELATED_INFO_SAVED' => '関連情報の保存',
	'JS_BLOCK_NAME_EXISTS' => 'ブロック名は既に存在します',
	'JS_NO_HIDDEN_FIELDS_EXISTS' => '無効なフィールドがありません',
	'JS_SPECIAL_CHARACTERS' => '特殊文字 (',
	'JS_NOT_ALLOWED' => ') は許可されません',
	'JS_FIELD_SEQUENCE_UPDATED' => 'フィールド順の更新',
	'JS_DUPLICATES_VALUES_FOUND' => '重複した値が見つかりました'
);
