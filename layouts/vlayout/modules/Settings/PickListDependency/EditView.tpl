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
	<div class="container-fluid">
		<div class="widget_header">
			<h3>{vtranslate('LBL_PICKLIST_DEPENDENCY', $QUALIFIED_MODULE)}</h3>
		</div>
		<hr>
		<div class="contents row-fluid">
			<form id="pickListDependencyForm" class="form-horizontal">
				{if !empty($MAPPED_VALUES)}
					<input type="hidden" class="editDependency" value="true"/>
				{/if}
				<div class="row-fluid">
					<div class="control-group">
						<label class="muted control-label">{vtranslate('LBL_SELECT_MODULE', $QUALIFIED_MODULE)}</label>
						<div class="controls">
							<span class="row-fluid">
								<select name="sourceModule" class="select2 span3">
									{foreach item=MODULE_MODEL from=$PICKLIST_MODULES_LIST}
										{assign var=MODULE_NAME value=$MODULE_MODEL->get('name')}
										<option value="{$MODULE_NAME}" {if $MODULE_NAME eq $SELECTED_MODULE} selected {/if}>{vtranslate($MODULE_MODEL->get('label'), $MODULE_MODEL->get('label'))}</option>
									{/foreach}
								</select>
							</span>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4 control-group">
						<label class="muted control-label">{vtranslate('LBL_SOURCE_FIELD', $QUALIFIED_MODULE)}</label>
						<div class="controls">
							<span class="row-fluid">
								<select id="sourceField" name="sourceField" class="select2 row-fluid" data-placeholder="{vtranslate('LBL_SELECT_FIELD', $QUALIFIED_MODULE)}">
									<option value=''></option>
									{foreach key=FIELD_NAME item=FIELD_LABEL from=$PICKLIST_FIELDS}
										<option value="{$FIELD_NAME}" {if $RECORD_MODEL->get('sourcefield') eq $FIELD_NAME} selected {/if}>{vtranslate($FIELD_LABEL, $SELECTED_MODULE)}</option>
									{/foreach}
								</select>
							</span>
						</div>
					</div>
					<div class="span4 control-group marginLeftZero">
						<label class="muted control-label">{vtranslate('LBL_TARGET_FIELD', $QUALIFIED_MODULE)}</label>
						<div class="controls">
							<span class="row-fluid">
								<select id="targetField" name="targetField" class="select2 row-fluid" data-placeholder="{vtranslate('LBL_SELECT_FIELD', $QUALIFIED_MODULE)}">
									<option value=''></option>
									{foreach key=FIELD_NAME item=FIELD_LABEL from=$PICKLIST_FIELDS}
										<option value="{$FIELD_NAME}" {if $RECORD_MODEL->get('targetfield') eq $FIELD_NAME} selected {/if}>{vtranslate($FIELD_LABEL, $SELECTED_MODULE)}</option>
									{/foreach}
								</select>
							</span>
						</div>
					</div>
				</div>
				<div class="row-fluid hide errorMessage">
					<div class="alert alert-error">
					  <strong>{vtranslate('LBL_ERR_CYCLIC_DEPENDENCY', $QUALIFIED_MODULE)}</strong>  
					</div>
				</div>
				<div id="dependencyGraph">
				{if $DEPENDENCY_GRAPH}
					{include file='DependencyGraph.tpl'|@vtemplate_path:$QUALIFIED_MODULE}
				{/if}
				</div>
			</form>
		</div>
	</div>
</div>
{/strip}
