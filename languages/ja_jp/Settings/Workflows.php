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
 //Basic Field Names
	'LBL_NEW' => '新規',
	'LBL_WORKFLOW' => 'ワークフロー',
	'LBL_CREATING_WORKFLOW' => 'ワークフローの作成',
	'LBL_EDITING_WORKFLOW' => 'ワークフローの編集',
	'LBL_NEXT' => '次へ',

 //Edit view
	'LBL_STEP_1' => 'ステップ 1 ',
	'LBL_ENTER_BASIC_DETAILS_OF_THE_WORKFLOW' => 'ワークフローの基本内容を入力します',
	'LBL_SPECIFY_WHEN_TO_EXECUTE' => 'このワークフローをいつ実行するか指定します',
	'ON_FIRST_SAVE' => '最初の保存時のみ',
	'ONCE' => '条件が初めて真になるまで',
	'ON_EVERY_SAVE' => 'レコード保存時に毎回',
	'ON_MODIFY' => 'レコード変更時に毎回',
	'MANUAL' => 'システム',
	'SCHEDULE_WORKFLOW' => 'ワークフローの計画',
	'ADD_CONDITIONS' => '条件の追加',
	'ADD_TASKS' => 'タスクの追加',

 //Step2 edit view
	'LBL_EXPRESSION' => '表現式',
	'LBL_FIELD_NAME' => 'フィールド',
	'LBL_SET_VALUE' => '値の設定',
	'LBL_USE_FIELD' => 'フィールドの使用',
	'LBL_USE_FUNCTION' => '関数の使用',
	'LBL_RAW_TEXT' => 'RAW テキスト',
	'LBL_ENABLE_TO_CREATE_FILTERS' => 'フィルタを作成するには有効にします',
	'LBL_CREATED_IN_OLD_LOOK_CANNOT_BE_EDITED' => 'このワークフローは旧方式にて作成されました 旧方式で作成された条件は編集できません。 条件を再作成するか、既存の条件を変更なしに使用します。',
	'LBL_USE_EXISTING_CONDITIONS' => '既存の条件を使用する',
	'LBL_RECREATE_CONDITIONS' => '条件を再作成する',
	'LBL_SAVE_AND_CONTINUE' => '保存 & 続行',

 //Step3 edit view
	'LBL_ACTIVE' => '有効',
	'LBL_TASK_TYPE' => 'タスクのタイプ',
	'LBL_TASK_TITLE' => 'タスクのタイトル',
	'LBL_ADD_TASKS_FOR_WORKFLOW' => 'ワークフローにタスクを追加します',
	'LBL_TASK_TYPE' => 'タスクのタイプ',
	'LBL_EXECUTE_TASK' => 'タスクを実行する',
	'LBL_SELECT_OPTIONS' => 'オプションの選択',
	'LBL_ADD_FIELD' => 'フィールドの追加',
	'LBL_ADD_TIME' => '時間の追加',
	'LBL_TITLE' => 'タイトル',
	'LBL_PRIORITY' => '優先度',
	'LBL_ASSIGNED_TO' => '担当',
	'LBL_TIME' => '時刻',
	'LBL_DUE_DATE' => '締切日',
	'LBL_THE_SAME_VALUE_IS_USED_FOR_START_DATE' => '開始日に同じ値が使用',
	'LBL_EVENT_NAME' => '予定名',
	'LBL_TYPE' => 'タイプ',
	'LBL_METHOD_NAME' => 'メソッド名',
	'LBL_RECEPIENTS' => '受取人',
	'LBL_ADD_FIELDS' => 'フィールドの追加',
	'LBL_SMS_TEXT' => 'SMS テキスト',
	'LBL_SET_FIELD_VALUES' => 'フィールド値の設定',
	'LBL_ADD_FIELD' => 'フィールドの追加',
	'LBL_IN_ACTIVE' => '有効',
	'LBL_SEND_NOTIFICATION' => '通知を送信する',
	'LBL_START_TIME' => '開始時間',
	'LBL_START_DATE' => '開始日',
	'LBL_END_TIME' => '終了時間',
	'LBL_END_DATE' => '終了日',
	'LBL_ENABLE_REPEAT' => '周期的に実施する',
	'LBL_NO_METHOD_IS_AVAILABLE_FOR_THIS_MODULE' => 'このモジュールには利用できるメソッドがありません',
	'LBL_FINISH' => '完了',
	'LBL_NO_TASKS_ADDED' => 'タスクがありません',
	'LBL_CANNOT_DELETE_DEFAULT_WORKFLOW' => 'デフォルトのワークフローは削除できません',
	'LBL_MODULES_TO_CREATE_RECORD' => 'レコードを作成するモジュール',
	'LBL_EXAMPLE_EXPRESSION' => '表現式',
	'LBL_EXAMPLE_RAWTEXT' => 'RAW テキスト',
	'LBL_VTIGER' => 'Vtiger',
	'LBL_EXAMPLE_FIELD_NAME' => 'フィールド',
	'LBL_NOTIFY_OWNER' => 'notify_owner',
	'LBL_ANNUAL_REVENUE' => 'annual_revenue',
	'LBL_EXPRESSION_EXAMPLE2' => "if mailingcountry == 'India' then concat(firstname,' ',lastname) else concat(lastname,' ',firstname) end"

 
);

$jsLanguageStrings = array(
	'JS_STATUS_CHANGED_SUCCESSFULLY' => 'ステータスが正しく変更されました',
	'JS_TASK_DELETED_SUCCESSFULLY' => 'タスクが正しく削除されました',
	'JS_SAME_FIELDS_SELECTED_MORE_THAN_ONCE' => '同一のフィールドが複数回選択されました',
	'JS_WORKFLOW_SAVED_SUCCESSFULLY' => 'ワークフローが正しく保存されました'
);
