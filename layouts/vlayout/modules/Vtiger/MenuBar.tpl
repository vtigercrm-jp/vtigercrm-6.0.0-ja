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
	{assign var="topMenus" value=$MENU_STRUCTURE->getTop()}
	{assign var="moreMenus" value=$MENU_STRUCTURE->getMore()}
	{assign var=NUMBER_OF_PARENT_TABS value = count(array_keys($moreMenus))} 

	<div class="navbar" id="topMenus">
		<div class="navbar-inner" id="nav-inner">
			<div class="menuBar row-fluid">
				{* overflow+height is required to avoid flickering UI due to responsive handling, overflow will be dropped later *}
				<div class="span9" style="overflow: hidden;">
					<ul class="nav modulesList">
						<li class="tabs">
							<a class="alignMiddle {if $MODULE eq 'Home'} selected {/if}" href="{$HOME_MODULE_MODEL->getDefaultUrl()}"><img src="{vimage_path('home.png')}" alt="{vtranslate('LBL_HOME',$moduleName)}" title="{vtranslate('LBL_HOME',$moduleName)}" /></a>
						</li>
						{foreach key=moduleName item=moduleModel from=$topMenus name=topmenu}
							{assign var='translatedModuleLabel' value=vtranslate($moduleModel->get('label'),$moduleName)}
							
							{assign var="topmenuClassName" value="tabs"}
							{* Make sure to keep selected + few menu persistently and rest responsive *}
							{if $smarty.foreach.topmenu.index > $MENU_TOPITEMS_LIMIT}
								{assign var="topmenuClassName" value="tabs opttabs"}
							{/if}
							
							<li class="{$topmenuClassName}">
								<a id="menubar_item_{$moduleName}" href="{$moduleModel->getDefaultUrl()}" {if $MODULE eq $moduleName} class="selected" {/if}>{$translatedModuleLabel}</a>
							</li>
						{/foreach}
						
						<li class="dropdown" id="moreMenu">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#moreMenu">
								{vtranslate('LBL_ALL',$MODULE)}
								<b class="caret"></b>
							</a>
							<div class="dropdown-menu moreMenus" {if ($NUMBER_OF_PARENT_TABS <= 2) && ($NUMBER_OF_PARENT_TABS != 0)}style="width: 30em;"{elseif $NUMBER_OF_PARENT_TABS == 0}style="width: 10em;"{/if}>
								{foreach key=parent item=moduleList from=$moreMenus name=more}
									{if $NUMBER_OF_PARENT_TABS >= 4} 
										{assign var=SPAN_CLASS value=span3} 
									{elseif $NUMBER_OF_PARENT_TABS == 3} 
										{assign var=SPAN_CLASS value=span4} 
									{elseif $NUMBER_OF_PARENT_TABS <= 2} 
										{assign var=SPAN_CLASS value=span6} 
									{/if} 
									{if $smarty.foreach.more.index % 4 == 0}
										<div class="row-fluid">
									{/if}
									<span class="{$SPAN_CLASS}"> 
										<strong>{vtranslate("LBL_$parent",$moduleName)}</strong><hr>
										{foreach key=moduleName item=moduleModel from=$moduleList}
											{assign var='translatedModuleLabel' value=vtranslate($moduleModel->get('label'),$moduleName)}
											<label class="moduleNames"><a id="menubar_item_{$moduleName}" href="{$moduleModel->getDefaultUrl()}">{$translatedModuleLabel}</a></label>
										{/foreach}
									</span>
									{if $smarty.foreach.more.last OR ($smarty.foreach.more.index+1) % 4 == 0}
										</div>
									{/if}
									{/foreach}
								{if $USER_MODEL->isAdminUser()}
									<div class="row-fluid">
										<a id="menubar_item_moduleManager" href="index.php?module=MenuEditor&parent=Settings&view=Index" class="pull-right">{vtranslate('LBL_CUSTOMIZE_MAIN_MENU',$MODULE)}</a>
									</div>
									<div class="row-fluid">
										<a id="menubar_item_moduleManager" href="index.php?module=ModuleManager&parent=Settings&view=List" class="pull-right">{vtranslate('LBL_ADD_MANAGE_MODULES',$MODULE)}</a>
									</div>
								{/if}
							</div>
						</li>
					</ul>
				</div>
				<div class="span3" id="headerLinks">
					<span class="pull-right headerLinksContainer">
						{foreach key=index item=obj from=$HEADER_LINKS}
							{assign var="src" value=$obj->getIconPath()}
							{assign var="icon" value=$obj->getIcon()}
							{assign var="title" value=$obj->getLabel()}
							{assign var="childLinks" value=$obj->getChildLinks()}
							<span class="dropdown span{if !empty($src)} settingIcons {/if}">
									{if !empty($src)}
										<a id="menubar_item_right_{$title}" class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{$src}" alt="{vtranslate($title,$MODULE)}" title="{vtranslate($title,$MODULE)}" /></a>
										{else}
											{assign var=title value=$USER_MODEL->get('first_name')}
											{if empty($title)}
												{assign var=title value=$USER_MODEL->get('last_name')}
											{/if}
										<span class="dropdown-toggle" data-toggle="dropdown" href="#">
											<a id="menubar_item_right_{$title}"  class="userName textOverflowEllipsis span" title="{$title}">{$title} <i class="caret"></i> </a> </span>
									{/if}
									{if !empty($childLinks)}
										<ul class="dropdown-menu pull-right">
											{foreach key=index item=obj from=$childLinks}
												{if $obj->getLabel() eq NULL}
													<li class="divider">&nbsp;</li>
												{else if $obj->getLabel() eq 'LBL_FEEDBACK'}
													<li>
														<a href="https://discussions.vtiger.com" target="_blank">{vtranslate($obj->getLabel(),$MODULE)}</a></li>
												{else}
													{assign var="id" value=$obj->getId()}
													{assign var="href" value=$obj->getUrl()}
													{assign var="label" value=$obj->getLabel()}
													{assign var="onclick" value=""}
													{if stripos($obj->getUrl(), 'javascript:') === 0}
														{assign var="onclick" value="onclick="|cat:$href}
														{assign var="href" value="javascript:;"}
													{/if}
													<li>
														<a target="{$obj->target}" id="menubar_item_right_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($label)}" {if $label=='Switch to old look'}switchLook{/if} href="{$href}" {$onclick}>{vtranslate($label,$MODULE)}</a>
													</li>
												{/if}
											{/foreach}
										</ul>
									{/if}
							</span>
						{/foreach}
					</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	{assign var="announcement" value=$ANNOUNCEMENT->get('announcement')}
	<div class="announcement noprint" id="announcement">
		<marquee direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onmouseover="javascript:stop();" onmouseout="javascript:start();">{if !empty($announcement)}{$announcement}{else}{vtranslate('LBL_NO_ANNOUNCEMENTS',$MODULE)}{/if}</marquee>
	</div>
	<input type='hidden' value="{$MODULE}" id='module' name='module'/>
	<input type="hidden" value="{$PARENT_MODULE}" id="parent" name='parent' />
	<input type='hidden' value="{$VIEW}" id='view' name='view'/>
{/strip}
