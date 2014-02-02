<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
$languageStrings = array(
	// Basic Strings
	'Leads' => 'Potencjalni klienci',
	'SINGLE_Leads' => 'Potencjalny klient',
	'LBL_RECORDS_LIST' => 'Lista rekordów',
	'LBL_ADD_RECORD' => 'Dodaj rekord',

	// Blocks
	'LBL_LEAD_INFORMATION' => 'Szczegóły potencjalnego klienta',

	//Field Labels
	'Lead No' => 'Numer potencjalnego klienta',
	'Company' => 'Firma',
	'Designation' => 'Stanowisko',
	'Website' => 'Strona internetowa',
	'Industry' => 'Branża',
	'Lead Status' => 'Status',
	'No Of Employees' => 'Liczba pracowników',
	'Phone' => 'Telefon podstawowy',
	'Secondary Email' => 'Mail dodatkowy',
	'Email' => 'Mail podstawowy',

	//Added for Existing Picklist Entries

	'--None--'=>'--Brak--',
	'Mr.'=>'Pan',
	'Ms.'=>'Panna',
	'Mrs.'=>'Pani',
	'Dr.'=>'dr', //Michał Zygmuntowicz
	'Prof.'=>'prof.', //Michał Zygmuntowicz

	//Lead Status Picklist values
	'Attempted to Contact'=>'Zakwalifikowany do kontaktu',
	'Cold'=>'Zimny',
	'Contact in Future'=>'Kontakt w przyszłości',
	'Contacted'=>'Nawiązano kontakt',
	'Hot'=>'Gorący',
	'Junk Lead'=>'Śmieciowy',
	'Lost Lead'=>'Utracony',
	'Not Contacted'=>'Brak kontaktu',
	'Pre Qualified'=>'Wstępnie zakwalifikowany',
	'Qualified'=>'Zakwalifikowany',
	'Warm'=>'Ciepły',

	// Mass Action
	'LBL_CONVERT_LEAD' => 'Konwertuj na kontrahenta',

	//Convert Lead
	'LBL_TRANSFER_RELATED_RECORD' => 'Transferuj powiązane rekordy do',
	'LBL_CONVERT_LEAD_ERROR' => 'Musisz wybrać albo kontakt albo kontrahentaa, by móc konwertować do kontrahenta',
	'LBL_CONVERT_LEAD_ERROR_TITLE' => 'Moduły wyłączone',
	'CANNOT_CONVERT' => 'Nie można wykonać konwertowania',
	'LBL_FOLLOWING_ARE_POSSIBLE_REASONS' => 'Możliwe przyczyny:',
	'LBL_LEADS_FIELD_MAPPING_INCOMPLETE' => 'Mapowanie pól nie zostało ukończone, przejdź do: (Settings > Module Manager > Leads > Leads Field Mapping)',
	'LBL_MANDATORY_FIELDS_ARE_EMPTY' => 'Wymagane pola są puste',
	'LBL_LEADS_FIELD_MAPPING' => 'Mapowanie pól potencjalnego klienta',

	//Leads Custom Field Mapping
	'LBL_CUSTOM_FIELD_MAPPING'=> 'Zarządzaj mapowaniem pól',
	'LBL_WEBFORMS' => 'Zarządzaj formularzami',
);
$jsLanguageStrings = array(
	'JS_SELECT_CONTACTS' => 'Zaznacz kontakt w celu kontynuowania',
	'JS_SELECT_ORGANIZATION' => 'Zaznacz kontrahenta w celu kontynuowania',
	'JS_SELECT_ORGANIZATION_OR_CONTACT_TO_CONVERT_LEAD' => 'Konwertowanie wymaga zaznaczenia kontaktu lub kontrahenta'
);