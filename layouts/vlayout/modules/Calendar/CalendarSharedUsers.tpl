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
<div name='calendarViewTypes'>
	<div id="calendarview-feeds" style="margin-left:10px;">
		<label class="checkbox" style="text-shadow: none">
			<input type="checkbox" data-calendar-sourcekey="Events33_{$CURRENTUSER_MODEL->getId()}" data-calendar-feed="Events" data-calendar-userid="{$CURRENTUSER_MODEL->getId()}" > <span class="label" style="text-shadow: none">{vtranslate('LBL_MINE',$MODULE)}</span>
		</label>	
		{foreach key=ID item=USER from=$SHAREDUSERS}
			<label class="checkbox">
				<input type="checkbox" data-calendar-sourcekey="Events33_{$ID}" data-calendar-feed="Events" data-calendar-userid="{$ID}" > <span class="label" style="text-shadow: none">{$USER}</span>
			</label>
		{/foreach}
	</div>
</div>
{/strip}
<script type="text/javascript">
jQuery(document).ready(function() {
	SharedCalendar_SharedCalendarView_Js.initiateCalendarFeeds();
});
</script>