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
<div class="recentActivitiesContainer">
	<div>
		{if !empty($RECENT_ACTIVITIES)}
			<ul class="unstyled">
				{foreach item=RECENT_ACTIVITY from=$RECENT_ACTIVITIES}
					{if $RECENT_ACTIVITY->isCreate()}
						<li>
							<div>
								<span><strong>{$RECENT_ACTIVITY->getModifiedBy()->getName()}</strong> {vtranslate('LBL_CREATED', $MODULE_NAME)}</span>
								<span class="pull-right"><p class="muted"><small title="{Vtiger_Util_Helper::formatDateTimeIntoDayString($RECENT_ACTIVITY->getParent()->get('createdtime'))}">{Vtiger_Util_Helper::formatDateDiffInStrings($RECENT_ACTIVITY->getParent()->get('createdtime'))}</small></p></span>
							</div>
						</li>
					{else if $RECENT_ACTIVITY->isUpdate()}
						<li>
							<div>
								<span><strong>{$RECENT_ACTIVITY->getModifiedBy()->getDisplayName()}</strong> {vtranslate('LBL_UPDATED', $MODULE_NAME)}</span>
								<span class="pull-right"><p class="muted"><small title="{Vtiger_Util_Helper::formatDateTimeIntoDayString($RECENT_ACTIVITY->getActivityTime())}">{Vtiger_Util_Helper::formatDateDiffInStrings($RECENT_ACTIVITY->getActivityTime())}</small></p></span>
							</div>

							{foreach item=FIELDMODEL from=$RECENT_ACTIVITY->getFieldInstances()}
								{if $FIELDMODEL && $FIELDMODEL->getFieldInstance() && $FIELDMODEL->getFieldInstance()->isViewableInDetailView()}
									<div class='font-x-small updateInfoContainer'>
										<i>{vtranslate($FIELDMODEL->getName(),$MODULE_NAME)}</i> :&nbsp;
										{if $FIELDMODEL->get('prevalue') neq ''}
											{$FIELDMODEL->getDisplayValue($FIELDMODEL->get('prevalue'))}&nbsp;{vtranslate('LBL_TO', $MODULE_NAME)}&nbsp;
										{else}
											{* First time change *}
										{/if}
										<b>{$FIELDMODEL->getDisplayValue($FIELDMODEL->get('postvalue'))}</b>
									</div>
								{/if}
							{/foreach}

						</li>
					{else if $RECENT_ACTIVITY->isRelationLink()}
						<li>
							<div class="row-fluid">
								{assign var=RELATION value=$RECENT_ACTIVITY->getRelationInstance()}
								<span>{vtranslate($RELATION->getLinkedRecord()->getModuleName(), $RELATION->getLinkedRecord()->getModuleName())} {vtranslate('LBL_ADDED', $MODULE_NAME)} <strong>{$RELATION->getLinkedRecord()->getName()}</strong></span>
								<span class="pull-right"><p class="muted"><small title="{Vtiger_Util_Helper::formatDateTimeIntoDayString($RELATION->getLinkedRecord()->get('createdtime'))}">{Vtiger_Util_Helper::formatDateDiffInStrings($RELATION->getLinkedRecord()->get('createdtime'))}</small></p></span>
							</div>
						</li>
					{else if $RECENT_ACTIVITY->isRelationUnLink()}
						<li>
							<div class="row-fluid">
								{assign var=URELATION value=$RECENT_ACTIVITY->getRelationInstance()}
								<span>{vtranslate($URELATION->getUnLinkedRecord()->getModuleName(), $URELATION->getUnLinkedRecord()->getModuleName())} {vtranslate('LBL_REMOVED', $MODULE_NAME)} <strong>{$URELATION->getUnLinkedRecord()->getName()}</strong></span>
								<span class="pull-right"><p class="muted"><small title="{Vtiger_Util_Helper::formatDateTimeIntoDayString($URELATION->getUnLinkedRecord()->get('modifiedtime'))}">{Vtiger_Util_Helper::formatDateDiffInStrings($URELATION->getUnLinkedRecord()->get('modifiedtime'))}</small></p></span>
							</div>
						</li>
					{else if $RECENT_ACTIVITY->isRestore()}
						<li>

						</li>
					{/if}
				{/foreach}
			</ul>
			{else}
				<div class="summaryWidgetContainer">
					<p class="textAlignCenter">{vtranslate('LBL_NO_RECENT_UPDATES')}</p>
				</div>
		{/if}
	</div>
	{if $PAGING_MODEL->isNextPageExists()}
		<div class="row-fluid">
			<div class="pull-right">
				<a href="javascript:void(0)" class="moreRecentUpdates">{vtranslate('LBL_MORE',$MODULE_NAME)}..</a>
			</div>
		</div>
	{/if}
	<span class="clearfix"></span>
</div>
{/strip}