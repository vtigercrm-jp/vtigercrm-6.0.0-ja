{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/
-->*}
{strip}
	<div class="recordDetails">
		<div>
			<label>
				<strong>{vtranslate('LBL_RECORD_SUMMARY',$MODULE_NAME)}</strong>
			</label>
		</div>
		<div class="row-fluid textAlignCenter roundedCorners">
			{foreach key=FIELD_NAME item=FIELD_VALUE from=$SUMMARY_INFORMATION}
				<span class="well squeezedWell marginLeftZero span" style='width:100px'>
					<div>
						<label class="font-x-small">
							{vtranslate($FIELD_NAME,$MODULE_NAME)}
						</label>
					</div>
					<div>
						<label class="font-x-x-large">
							{if !empty($FIELD_VALUE)}{$FIELD_VALUE}{else}0{/if}
						</label>
					</div>
				</span>
			{/foreach}
		</div>
		{include file='SummaryViewContents.tpl'|@vtemplate_path}
	</div>
{/strip}