<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
$languageStrings = array(
	'MailConverter'                => 'Сканер Почты'     , // KEY 5.x: LBL_MAIL_SCANNER
	'MailConverter_Description'    => 'Convert emails to respective records', // TODO: Review
	'MAILBOX'                      => 'MailBox'                     , // TODO: Review
	'RULE'                         => 'Правило'              , // KEY 5.x: LBL_RULE
	'LBL_ADD_RECORD'               => 'Add MailBox'                 , // TODO: Review
	'ALL'                          => 'Все'                      , // KEY 5.x: LBL_ALL
	'UNSEEN'                       => 'Непрочитанное'  , // KEY 5.x: LBL_UNREAD
	'LBL_MARK_READ'                => 'Mark Read'                   , // TODO: Review
	'SEEN'                         => 'Прочитанное'      , // KEY 5.x: LBL_READ
	'LBL_EDIT_MAILBOX'             => 'Edit MailBox'                , // TODO: Review
	'LBL_CREATE_MAILBOX'           => 'Create MailBox'              , // TODO: Review
	'LBL_BACK_TO_MAILBOXES'        => 'Back to MailBoxes'           , // TODO: Review
	'LBL_MARK_MESSAGE_AS'          => 'Отметить сообщение как', 
	'LBL_MAX_LIMIT_ONLY_TWO'       => 'You can configure only two mailboxes', // TODO: Review
	'LBL_IS_IN_RUNNING_STATE'      => 'is in running state'         , // TODO: Review
	'LBL_SAVED_SUCCESSFULLY'       => 'Saved successfully'          , // TODO: Review
	'LBL_CONNECTION_TO_MAILBOX_FAILED' => 'Connecting to mailbox failed!', // TODO: Review
	'LBL_DELETED_SUCCESSFULLY'     => 'Deleted successfully'        , // TODO: Review
	'LBL_RULE_DELETION_FAILED'     => 'Rule deletion failed'        , // TODO: Review
	'LBL_RULES_SEQUENCE_INFO_IS_EMPTY' => 'Rules sequnce information is empty', // TODO: Review
	'LBL_SEQUENCE_UPDATED_SUCCESSFULLY' => 'Sequence updated successfully', // TODO: Review
	'LBL_SCANNED_SUCCESSFULLY'     => 'Scanned successfully'        , // TODO: Review
	'scannername'                  => 'Scanner Name'                , // TODO: Review
	'server'                       => 'Имя Сервера'       , // KEY 5.x: LBL_OUTGOING_MAIL_SERVER
	'protocol'                     => 'Протокол'            , // KEY 5.x: LBL_PROTOCOL
	'username'                     => 'Пользователь'    , // KEY 5.x: LBL_USERNAME
	'password'                     => 'Пароль'                , // KEY 5.x: LBL_PASWRD
	'ssltype'                      => 'SSL Type'                    , // TODO: Review
	'sslmethod'                    => 'SSL Method'                  , // TODO: Review
	'connecturl'                   => 'Connect Url'                 , // TODO: Review
	'searchfor'                    => 'Look For'                    , // TODO: Review
	'markas'                       => 'After Scan'                  , // TODO: Review
	'LBL_ENABLE'                   => 'Подключить'        , 
	'LBL_DISABLE'                  => 'Запретить'          , 
	'LBL_STATUS_MESSAGE'           => 'Check To make active'        , // TODO: Review
	'LBL_VALIDATE_SSL_CERTIFICATE' => 'действительный сертификат SSL', // KEY 5.x: LBL_VAL_SSL_CERT
	'LBL_DO_NOT_VALIDATE_SSL_CERTIFICATE' => 'не действующий SSL сертификат', // KEY 5.x: LBL_DONOT_VAL_SSL_CERT
	'LBL_ALL_MESSAGES_FROM_LAST_SCAN' => 'All messages from last scan' , // TODO: Review
	'LBL_UNREAD_MESSAGES_FROM_LAST_SCAN' => 'Unread messages from last scan', // TODO: Review
	'LBL_MARK_MESSAGES_AS_READ'    => 'Mark messages as read'       , // TODO: Review
	'LBL_I_DONT_KNOW'              => 'I don\'t know'               , // TODO: Review
	'LBL_SCAN_NOW'                 => 'Сканировать Сейчас', 
	'LBL_RULES_LIST'               => 'Rules List'                  , // TODO: Review
	'LBL_SELECT_FOLDERS'           => 'Select Folders'              , // TODO: Review
	'LBL_SCANED_SUCCESSFULLY'      => 'Scanned successfully'        , // TODO: Review
	'LBL_FOLDERS_INFO_IS_EMPTY'    => 'Folders information is empty', // TODO: Review
	'LBL_UPDATE_FOLDERS'           => 'Update Folders'              , // TODO: Review
	'fromaddress'                  => 'От'                        , // KEY 5.x: LBL_FROM
	'toaddress'                    => 'Для'                      , // KEY 5.x: LBL_TO
	'subject'                      => 'Тема'                    , // KEY 5.x: LBL_SUBJECT
	'body'                         => 'Тело'                    , // KEY 5.x: LBL_BODY
	'matchusing'                   => 'Подходит'            , // KEY 5.x: LBL_MATCH
	'action'                       => 'Действие'            , // KEY 5.x: LBL_ACTION
	'LBL_PRIORITY'                 => 'приоритет'          , 
	'PRIORITISE_MESSAGE'           => 'Drag and drop block to prioritise the rule', // TODO: Review
	'LBL_ALL_CONDITIONS'           => 'All Conditions'              , // TODO: Review
	'LBL_ANY_CONDITIOn'            => 'Any Condition'               , // TODO: Review
	'Contains'                     => 'Содержит'            , // KEY 5.x: LBL_CONTAINS
	'Not Contains'                 => 'Not Contains'                , // TODO: Review
	'Equals'                       => 'Равно'                  , // KEY 5.x: LBL_EQUALS
	'Not Equals'                   => 'Not Equals'                  , // TODO: Review
	'Begins With'                  => 'Begin'                       , // TODO: Review
	'Ends With'                    => 'Конец'                  , // KEY 5.x: LNK_LIST_END
	'Regex'                        => 'Регулярное'        , // KEY 5.x: LBL_REGEX
	'CREATE_HelpDesk_FROM'         => 'Create Ticket'               , // TODO: Review
	'UPDATE_HelpDesk_SUBJECT'      => 'Update Ticket'               , // TODO: Review
	'LINK_Contacts_FROM'           => 'Add to Contact [FROM]'       , // TODO: Review
	'LINK_Contacts_TO'             => 'Add to Contact [TO]'         , // TODO: Review
	'LINK_Accounts_FROM'           => 'Add to Organization [FROM]'  , // TODO: Review
	'LINK_Accounts_TO'             => 'Add to Organization [TO]'    , // TODO: Review
	'LBL_UNSELECT_ALL'             => 'Снять Метки'       , 
	'LBL_CONVERT_EMAILS_TO_RESPECTIVE_RECORDS' => 'Convert emails to respective records', // TODO: Review
	'LBL_DRAG_AND_DROP_BLOCK_TO_PRIORITISE_THE_RULE' => 'Drag and drop block to prioritise the rule', // TODO: Review
	'LBL_ADD_RULE'                 => 'Добавить Правило', 
	'LBL_DELETE_RULE'              => 'Delete rule'                 , // TODO: Review
	'LBL_BODY'                     => 'Тело'                    , 
	'LBL_MATCH'                    => 'Подходит'            , 
	'LBL_ACTION'                   => 'Действие'            , 
	'LBL_FROM'                     => 'От'                        , 
);
$jsLanguageStrings = array(
	'JS_MAILBOX_DELETED_SUCCESSFULLY' => 'MailBox deleted Successfully', // TODO: Review
	'JS_MAILBOX_LOADED_SUCCESSFULLY' => 'MailBox loaded Successfully' , // TODO: Review
);