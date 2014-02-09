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
	'HelpDesk' => 'サポート依頼',
	'SINGLE_HelpDesk' => 'サポート依頼',
	'LBL_ADD_RECORD' => 'サポート依頼の追加',
	'LBL_RECORDS_LIST' => 'サポート依頼の一覧',

 // Blocks
	'LBL_TICKET_INFORMATION' => 'サポート依頼の情報',
	'LBL_TICKET_RESOLUTION' => 'サポート依頼の解決',

 //Field Labels
	'Ticket No' => 'サポート依頼番号',
	'Severity' => '重要度',
	'Update History' => '履歴の更新',
	'Hours' => '時間数',
	'Days' => '日数',
	'Title' => 'タイトル',
	'Solution' => '解決方法',
	'From Portal' => 'ポータルから',
	'Related To' => '顧客企業名',
	'Contact Name' => '顧客担当者名',
 //Added for existing picklist entries

	'Big Problem'=>'大きな問題',
	'Small Problem'=>'小さな問題',
	'Other Problem'=>'その他問題',

	'Normal'=>'通常',
	'High'=>'高',
	'Urgent'=>'緊急',

	'Minor'=>'軽微',
	'Major'=>'重大',
	'Feature'=>'要望',
	'Critical'=>'極めて重大',

	'Open'=>'未解決',
	'Wait For Response'=>'回答待ち',
	'Closed'=>'完了',
	'LBL_STATUS' => 'ステータス',
	'LBL_SEVERITY' => '重要度',
 //DetailView Actions
	'LBL_CONVERT_FAQ' => 'よくある質問に変換',
	'LBL_RELATED_TO' => '関連',

 //added to support i18n in ticket mails
	'Ticket ID'=>'サポート依頼 ID',
	'Hi' => 'お客様のお名前：',
	'Dear'=> 'あて先：',
	'LBL_PORTAL_BODY_MAILINFO'=> 'サポートのご依頼',
	'LBL_DETAIL' => '詳細は次のとおりです：',
	'LBL_REGARDS'=> '宜しくお願いいたします',
	'LBL_TEAM'=> 'ヘルプデスク部門',
	'LBL_TICKET_DETAILS' => 'サポート依頼の詳細',
	'LBL_SUBJECT' => '表題： ',
	'created' => '作成日',
	'replied' => 'への返答がございます。',
	'reply'=>'返答がございます ⇒',
	'customer_portal' => '( vTiger “顧客ポータル” 内 )。',
	'link' => '以下のリンクから返答をご覧いただけます：',
	'Thanks' => '宜しくお願いいたします',
	'Support_team' => 'Vtiger サポート部門',
	'The comments are' => 'コメント内容：',
	'Ticket Title' => 'サポート依頼のタイトル',
	'Re' => 'Re :',

 //This label for customerportal.
	'LBL_STATUS_CLOSED' =>'完了',//Do not convert this label. This is used to check the status. If the status 'Closed' is changed in vtigerCRM server side then you have to change in customerportal language file also.
	'LBL_STATUS_UPDATE' => 'サポート依頼のステータスが更新されました：',
	'LBL_COULDNOT_CLOSED' => 'サポート依頼の操作にエラーがありました：',
	'LBL_CUSTOMER_COMMENTS' => '顧客はあなたの返答に次の追加の情報を提供しました：',
	'LBL_RESPOND'=> '上記サポート依頼に速やかに対処していただくようお願いします。',
	'LBL_SUPPORT_ADMIN' => 'サポート管理者',
	'LBL_RESPONDTO_TICKETID' =>'次のサポート依頼 ID に対応してください：',
	'LBL_RESPONSE_TO_TICKET_NUMBER' =>'チケット番号への回答：',
	'LBL_TICKET_NUMBER' => 'サポート依頼番号',
	'LBL_CUSTOMER_PORTAL' => '( 顧客ポータル内 ) - 緊急',
	'LBL_LOGIN_DETAILS' => '以下はあなたの顧客ポータル ログインの詳細です：',
	'LBL_MAIL_COULDNOT_SENT' =>'メールを送信できません',
	'LBL_USERNAME' => 'ユーザー名：',
	'LBL_PASSWORD' => 'パスワード：',
	'LBL_SUBJECT_PORTAL_LOGIN_DETAILS' => 'あなたの顧客ポータル ログインの詳細について',
	'LBL_GIVE_MAILID' => '電子メール ID を提供してください',
	'LBL_CHECK_MAILID' => '顧客ポータル用の電子メール ID を確認してください',
	'LBL_LOGIN_REVOKED' => 'ログインは取り消されました。 管理者にお問い合わせください。',
	'LBL_MAIL_SENT' => '顧客ポータル ログインの詳細を記したメールがあなたのメール ID に送信されました',
	'LBL_ALTBODY' => 'これは HTML 非対応メール クライアント向けのプレーン テキスト内容です',
	'HelpDesk ID' => 'サポート依頼 ID',
);
