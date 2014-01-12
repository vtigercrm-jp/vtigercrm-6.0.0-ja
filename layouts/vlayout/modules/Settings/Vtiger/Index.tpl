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
	<div class="container-fluid settingsIndexPage">
		<div class="widget_header row-fluid"><h3>{vtranslate('LBL_SUMMARY',$MODULE)}</h3></div>
		<hr>
		<div class="row-fluid">
			<span class="span4 row-fluid">
				<a href="index.php?module=Users&parent=Settings&view=List">
					<span><h2 style="font-size: 44px" class="themeTextColor pull-left">{$USERS_COUNT}</h2></span>
					<span class="span3 font-x-large themeTextColor" style="margin-top:17px;margin-left:10px">{vtranslate('LBL_ACTIVE_USERS',$MODULE)}</span>
				</a>
			</span>
			<span class="span4 row-fluid">
				<a href="index.php?module=Workflows&parent=Settings&view=List">
				<h2 style="font-size: 44px" class="themeTextColor pull-left">{$ACTIVE_WORKFLOWS}</h2>
					<span class="span3 font-x-large themeTextColor" style="margin-top:17px;margin-left:10px">{vtranslate('LBL_WORKFLOWS_ACTIVE',$MODULE)}</span>
				</a>
			</span>
			<span class="span4 row-fluid">
				<a href="index.php?module=ModuleManager&parent=Settings&view=List">
				<h2 style="font-size: 44px" class="themeTextColor pull-left">{$ACTIVE_MODULES}</h2>
					<span class="span3 font-x-large themeTextColor" style="margin-top:17px;margin-left:10px">{vtranslate('LBL_MODULES',$MODULE)}</span>
				</a>
			</span>
		</div>
		<br><br>
		<h3>{vtranslate('LBL_SETTINGS_SHORTCUTS',$MODULE)}</h3>
		<hr>
		<div id="settingsShortCutsContainer" class="row-fluid"/>
		{foreach item=SETTINGS_SHORTCUT from=$SETTINGS_SHORTCUTS name=shortcuts}
			{include file='SettingsShortCut.tpl'|@vtemplate_path:$MODULE}
		{/foreach}

	</div>
{/strip}
