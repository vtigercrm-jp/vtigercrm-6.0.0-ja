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
	'SINGLE_Calendar' => 'タスク',
	'SINGLE_Events' => 'イベント',
	'LBL_ADD_TASK' => 'タスクの追加',
	'LBL_ADD_EVENT' => 'イベントの追加',
	'LBL_RECORDS_LIST' => '予定表の一覧',
	'LBL_EVENTS' => 'イベント',
	'LBL_TODOS' => 'To Do',
	'LBL_CALENDAR_SETTINGS' => '予定表の設定',
	'LBL_CALENDAR_SHARING' => '予定表の共有',
	'LBL_DEFAULT_EVENT_DURATION' => 'デフォルトのイベント期間',
	'LBL_CALL' => '連絡',
	'LBL_OTHER_EVENTS' => '他のイベント',
	'LBL_MINUTES' => '分',
	'LBL_SELECT_USERS' => 'ユーザーの選択',
	'LBL_EVENT_OR_TASK' => 'イベント / タスク',

 // Blocks
	'LBL_TASK_INFORMATION' => 'タスクの詳細',

 //Fields
	'Subject' => '表題',
	'Start Date & Time' => '開始日時',
	'Activity Type'=>'活動タイプ',
	'Send Notification'=>'通知を送信する',
	'Location'=>'場所',
	'End Date & Time' => '終了日時',

 //Side Bar Names
	'LBL_ACTIVITY_TYPES' => '活動タイプ',
	'LBL_CONTACTS_SUPPORT_END_DATE' => 'サポート終了日',
	'LBL_CONTACTS_BIRTH_DAY' => '誕生日',
	'LBL_ADDED_CALENDARS' => '追加された予定表',


 //Activity Type picklist values
	'Call' => '連絡',
	'Meeting' => '会議',
	'Task' => 'タスク',

 //Status picklist values
	'Planned' => '計画済み',
	'Completed' => '完了',
	'Pending Input' => '入力待ち',
	'Not Started' => '未開始',
	'Deferred' => '遅延',

 //Priority picklist values
	'Medium' => '中',

	'LBL_CHANGE_OWNER' => '担当の変更',

	'LBL_EVENT' => 'イベント',
	'LBL_TASK' => 'タスク',
	'LBL_TASKS' => 'タスク',

	'LBL_RECORDS_LIST' => '一覧表示',
	'LBL_CALENDAR_VIEW' => '私の予定表',
	'LBL_SHARED_CALENDAR' => '共有された予定表',

 //Repeat Lables - used by getTranslatedString
	'LBL_DAY0' => '日曜日',
	'LBL_DAY1' => '月曜日',
	'LBL_DAY2' => '火曜日',
	'LBL_DAY3' => '水曜日',
	'LBL_DAY4' => '木曜日',
	'LBL_DAY5' => '金曜日',
	'LBL_DAY6' => '土曜日',

	'first' => '最初',
	'last' => '最後',
	'LBL_DAY_OF_THE_MONTH' => '日目/月',
	'LBL_ON' => ' 、日時：',

	'Daily'=>'日',
	'Weekly'=>'週',
	'Monthly'=>'月',
	'Yearly'=>'年',
 
 //Import and Export Labels
	'LBL_IMPORT_RECORDS' => 'レコードのインポート',
	'LBL_RESULT' => '結果',
	'LBL_FINISH' => '完了',
	'LBL_TOTAL_TASKS_IMPORTED' => '正しくインポートされたタスク数 ',
	'LBL_TOTAL_TASKS_SKIPPED' => '必須フィールドがないためスキップされたタスク数 ',
	'LBL_TOTAL_EVENTS_IMPORTED' => '正しくインポートされたイベント数 ',
	'LBL_TOTAL_EVENTS_SKIPPED' => '必須フィールドがないためスキップされたイベント数 ',
 
	'ICAL_FORMAT' => 'iCal フォーマット',
	'LBL_LAST_IMPORT_UNDONE'=>'最新のインポートは取り消されました',
	'LBL_UNDO_LAST_IMPORT' => '最新のインポートを取り消す'

);

$jsLanguageStrings = array(
	'LBL_ADD_EVENT_TASK' => 'イベント / タスクの追加',
	'JS_TASK_IS_SUCCESSFULLY_ADDED_TO_YOUR_CALENDAR' => 'タスクは予定表に正しく追加されました',
    'LBL_SYNC_BUTTON' => '今すぐ同期',
    'LBL_SYNCRONIZING' => '同期中...',
    'LBL_NOT_SYNCRONIZED' => 'まだ同期していません',
    'LBL_FIELD_MAPPING' => 'フィールド マッピング',
    'LBL_CANT_SELECT_CONTACT_FROM_LEADS' => '$$$Contacts for Leadsを選択できません',
    'JS_FUTURE_EVENT_CANNOT_BE_HELD' => '：未来の日時は設定できません',
 
 //Calendar view label translation
	'LBL_MONTH' => '月',
	'LBL_TODAY' => '今日',
	'LBL_DAY' => '日',
	'LBL_WEEK' => '週',
 
	'LBL_SUNDAY' => '日曜日',
	'LBL_MONDAY' => '月曜日',
	'LBL_TUESDAY' => '火曜日',
	'LBL_WEDNESDAY' => '水曜日',
	'LBL_THURSDAY' => '木曜日',
	'LBL_FRIDAY' => '金曜日',
	'LBL_SATURDAY' => '土曜日',
 
	'LBL_SUN' => '日',
	'LBL_MON' => '月',
	'LBL_TUE' => '火',
	'LBL_WED' => '水',
	'LBL_THU' => '木',
	'LBL_FRI' => '金',
	'LBL_SAT' => '土',
 
	'LBL_JANUARY' => '1 月',
	'LBL_FEBRUARY' => '2 月',
	'LBL_MARCH' => '3 月',
	'LBL_APRIL' => '4 月',
	'LBL_MAY' => '5 月',
	'LBL_JUNE' => '6 月',
	'LBL_JULY' => '7 月',
	'LBL_AUGUST' => '8 月',
	'LBL_SEPTEMBER' => '9 月',
	'LBL_OCTOBER' => '10 月',
	'LBL_NOVEMBER' => '11 月',
	'LBL_DECEMBER' => '12 月',
 
	'LBL_JAN' => '1 月',
	'LBL_FEB' => '2 月',
	'LBL_MAR' => '3 月',
	'LBL_APR' => '4 月',
	'LBL_MAY' => '5 月',
	'LBL_JUN' => '6 月',
	'LBL_JUL' => '7 月',
	'LBL_AUG' => '8 月',
	'LBL_SEP' => '9 月',
	'LBL_OCT' => '10 月',
	'LBL_NOV' => '11 月',
	'LBL_DEC' => '12 月',
 
	'LBL_ALL_DAY' => '全日',
 //End
);
