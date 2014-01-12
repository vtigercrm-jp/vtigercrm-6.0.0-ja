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
<div style='padding:5px'>
{if count($MODELS) > 0}
	<div class='row-fluid'>
		<div class='span12'>
			<div class='row-fluid'>
				<div class='span4'>
					<b>{vtranslate('Potential Name', $MODULE_NAME)}</b>
				</div>
				<div class='span4'>
					<b>{vtranslate('Amount', $MODULE_NAME)}</b>
				</div>
				<div class='span4'>
					<b>{vtranslate('Related To', $MODULE_NAME)}</b>
				</div>
			</div>
		</div>
		<hr>
		{foreach item=MODEL from=$MODELS}
		<div class='row-fluid'>
			<div class='span4'>
				<a href="{$MODEL->getDetailViewUrl()}">{$MODEL->getName()}</a>
			</div>
			<div class='span4'>
				{$MODEL->getDisplayValue('amount')}
			</div>
			<div class='span4'>
				{$MODEL->getDisplayValue('related_to')}
			</div>
		</div>
		{/foreach}
	</div>
{else}
	<span class="noDataMsg">
		{* JFV - remove LBL_NO for ja_jp *}
		{if $smarty.session.authenticated_user_language eq 'ja_jp'}
		条件に一致する{vtranslate($MODULE_NAME, $MODULE_NAME)}はありません
		{else}
		{vtranslate('LBL_NO')} {vtranslate($MODULE_NAME, $MODULE_NAME)} {vtranslate('LBL_MATCHED_THIS_CRITERIA')}
		{/if}
		{* JFV END *}
	</span>
{/if}
</div>