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
	'MailConverter' => 'メール コンバーター',
	'MailConverter_Description' => '電子メールを各レコードに変換します',
	'MAILBOX' => 'メールボックス',
	'RULE' => 'ルール',
	'LBL_ADD_RECORD' => 'メールボックスの追加',
	'ALL' => 'すべて',
	'UNSEEN' => '未読',
	'LBL_MARK_READ' => '既読にマーク',
	'SEEN' => '既読',
	'LBL_EDIT_MAILBOX' => 'メールボックスの編集',
    'LBL_CREATE_MAILBOX' => 'メールボックスの作成',
	'LBL_BACK_TO_MAILBOXES' => 'メールボックスに戻る',
	'LBL_MARK_MESSAGE_AS' => 'メッセージをマーク：',
 
 //Server Messages
	'LBL_MAX_LIMIT_ONLY_TWO' => '設定できるメールボックスは 2 つのみです',
	'LBL_IS_IN_RUNNING_STATE' => '実行状態',
	'LBL_SAVED_SUCCESSFULLY' => '正しく保存されました',
	'LBL_CONNECTION_TO_MAILBOX_FAILED' => 'メールボックス接続が失敗しました。',
	'LBL_DELETED_SUCCESSFULLY' => '正しく削除されました',
	'LBL_RULE_DELETION_FAILED' => 'ルールの削除に失敗しました',
	'LBL_RULES_SEQUENCE_INFO_IS_EMPTY' => 'ルール順序の情報が空です',
	'LBL_SEQUENCE_UPDATED_SUCCESSFULLY' => '順番が正しく更新されました',
	'LBL_SCANNED_SUCCESSFULLY' => '正しくスキャンされました',

 //Field Names
	'scannername' => 'スキャナー名',
	'server' => 'サーバー名',
	'protocol' => 'プロトコル',
	'username' => 'ユーザー名',
	'password' => 'パスワード',
	'ssltype' =>  'SSL タイプ',
	'sslmethod' => 'SSL 方式',
	'connecturl' => '接続 URL',
	'searchfor' => '対象',
	'markas' => 'スキャン後',

 //Field values & Messages
	'LBL_ENABLE' => '有効',
	'LBL_DISABLE' =>'無効',
	'LBL_STATUS_MESSAGE' => 'チェックして有効にします',
	'LBL_VALIDATE_SSL_CERTIFICATE' => 'SSL 証明書を検証する',
	'LBL_DO_NOT_VALIDATE_SSL_CERTIFICATE' => 'SSL 証明書を検証しない',
	'LBL_ALL_MESSAGES_FROM_LAST_SCAN' => '最後のスキャン後のすべてのメッセージ',
	'LBL_UNREAD_MESSAGES_FROM_LAST_SCAN' => '最後のスキャン後の未読メッセージ',
	'LBL_MARK_MESSAGES_AS_READ' => 'メッセージを既読にマーク',
	'LBL_I_DONT_KNOW' => "不明",

 //Mailbox Actions
	'LBL_SCAN_NOW' => '直ちにスキャン',
	'LBL_RULES_LIST' => 'ルール一覧',
	'LBL_SELECT_FOLDERS' => 'フォルダの選択',

 //Action Messages
	'LBL_DELETED_SUCCESSFULLY' => '正しく削除されました',
	'LBL_RULE_DELETION_FAILED' => 'ルールの削除に失敗しました',
	'LBL_SAVED_SUCCESSFULLY' => '正しく保存されました',
	'LBL_SCANED_SUCCESSFULLY' => '正しくスキャンされました',
	'LBL_IS_IN_RUNNING_STATE' => 'は実行状態です',
	'LBL_FOLDERS_INFO_IS_EMPTY' => 'フォルダ情報が空です',
	'LBL_RULES_SEQUENCE_INFO_IS_EMPTY' => 'ルール順序の情報が空です',

 //Folder Actions
	'LBL_UPDATE_FOLDERS' => 'フォルダの更新',

 //Rule Fields
	'fromaddress' => '送信者',
	'toaddress' => '宛先',
	'subject' => '表題',
	'body' => 'ボディー',
	'matchusing' => '一致',
	'action' => '操作',

 //Rules List View labels
	'LBL_PRIORITY' => '優先度',
	'PRIORITISE_MESSAGE' => 'ドラッグ アンド ドロップでルールを優先付します',

 //Rule Field values & Messages
	'LBL_ALL_CONDITIONS' => 'すべての条件',
	'LBL_ANY_CONDITIOn' => 'いずれかの条件',

 //Rule Conditions
	'Contains' => '含む',
	'Not Contains' => '含まない',
	'Equals' => '等しい',
	'Not Equals' => '等しくない',
	'Begins With' => '文頭一致',
	'Ends With' => '文末一致',
	'Regex' => '正規表現',

 //Rule Actions
	'CREATE_HelpDesk_FROM' => 'サポート依頼の作成',
	'UPDATE_HelpDesk_SUBJECT' => 'サポート依頼の更新',
	'LINK_Contacts_FROM' => '顧客担当者に追加 [送信者]',
	'LINK_Contacts_TO' => '顧客担当者に追加 [宛先]',
	'LINK_Accounts_FROM' => '顧客企業に追加 [送信者]',
	'LINK_Accounts_TO' => '顧客企業に追加 [宛先]',
    
    //Select Folder
    'LBL_UPDATE_FOLDERS' => 'フォルダの更新',
    'LBL_UNSELECT_ALL' => 'すべて選択解除',
 
 //Setup Rules
	'LBL_CONVERT_EMAILS_TO_RESPECTIVE_RECORDS' => '電子メールを各レコードに変換します',
	'LBL_DRAG_AND_DROP_BLOCK_TO_PRIORITISE_THE_RULE' => 'ドラッグ アンド ドロップでルールを優先付します',
	'LBL_ADD_RULE' => '条件の追加',
	'LBL_PRIORITY' => '優先度',
	'LBL_DELETE_RULE' => 'ルールの削除',
	'LBL_BODY' => 'ボディー',
	'LBL_MATCH' => '一致',
	'LBL_ACTION' => '操作',
	'LBL_FROM' => '送信者',
);
$jsLanguageStrings = array(
	'JS_MAILBOX_DELETED_SUCCESSFULLY' => 'メールボックスが正しく削除されました',
	'JS_MAILBOX_LOADED_SUCCESSFULLY' => 'メールボックスが正しく読み込まれました'
); 
