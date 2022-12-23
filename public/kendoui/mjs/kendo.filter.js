/**
 * Kendo UI v2022.3.1109 (http://www.telerik.com/kendo-ui)
 * Copyright 2022 Progress Software Corporation and/or one of its subsidiaries or affiliates. All rights reserved.
 *
 * Kendo UI commercial licenses may be obtained at
 * http://www.telerik.com/purchase/license-agreement/kendo-ui-complete
 * If you do not own a commercial license, this file shall be governed by the trial license terms.
 */
import"./kendo.core.js";import"./kendo.buttongroup.js";var __meta__={id:"filter",name:"Filter",category:"web",depends:["core","buttongroup"]},editors={number:"<input id='#=id#' type='text' aria-label='#=field#' title='#=field#' data-#=ns#role='numerictextbox' data-#=ns#bind='value: value'/>",string:"<span class='k-textbox k-input k-input-md k-rounded-md k-input-solid'><input id='#=id#' type='text' aria-label='#=field#' title='#=field#' class='k-input-inner' data-#=ns#bind='value: value'/></span>",boolean:"<input id='#=id#' class='k-checkbox k-checkbox-md k-rounded-md' aria-label='#=field#' data-#=ns#role='checkbox' data-#=ns#bind='checked: value' type='checkbox'>",date:"<input id='#=id#' type='text' aria-label='#=field#' title='#=field#' data-#=ns#role='datepicker' data-#=ns#bind='value: value'/>"},defaultValues={number:0,boolean:!1,string:"",date:""},operatorsTemplate="<select data-#=ns#bind='value: operator' title='#=operatorsLabel#' data-#=ns#role='dropdownlist'>#for(var op in operators){#<option value='#=op#'>#=operators[op].text || operators[op]#</option>#}#</select>",logicTemplate="<div data-#=ns#bind='value: logic' data-#=ns#role='filterbuttongroup'>#for(var op in operators){#<span value='#=op#'>#=operators[op]#</span>#}#</div>",mainContainer="<ul class='k-filter-container'><li class='k-filter-group-main'></li></ul>",mainLogicTemplate="<div class='k-filter-toolbar'><div role='toolbar' aria-label='#=mainFilterLogicLabel#' class='k-toolbar' id='#=uid#'><div class='k-filter-toolbar-item'>"+logicTemplate+"</div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-icon-button' role='button' aria-disabled='false' title='#=addExpression#' aria-label='#=addExpression#' tabindex='0'><span class='k-button-icon k-icon k-i-filter-add-expression'></span></button></div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-icon-button' role='button' aria-disabled='false' title='#=addGroup#' aria-label='#=addGroup#' tabindex='0'><span class='k-button-icon k-icon k-i-filter-add-group'></span></button></div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-flat k-button-flat-base k-icon-button' role='button' title='#=close#' aria-label='#=close#' aria-disabled='false' tabindex='0'><span class='k-button-icon k-icon k-i-close'></span></button></div></div></div>",logicItemTemplate="<li class='k-filter-item'><div class='k-filter-toolbar'><div role='toolbar' aria-label='#=filterLogicLabel#' class='k-toolbar'><div class='k-filter-toolbar-item'>"+logicTemplate+"</div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-icon-button' role='button' title='#=addExpression#' aria-label='#=addExpression#' aria-disabled='false' tabindex='0'><span class='k-button-icon k-icon k-i-filter-add-expression'></span></button></div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-icon-button' role='button' title='#=addGroup#' aria-label='#=addGroup#' aria-disabled='false' tabindex='0'><span class='k-button-icon k-icon k-i-filter-add-group'></span></button></div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-flat k-button-flat-base k-icon-button' role='button' title='#=close#' aria-label='#=close#' aria-disabled='false' tabindex='0'><span class='k-button-icon k-icon k-i-close'></span></button></div></div></div></li>",expressionItemTemplate="<li class='k-filter-item'><div class='k-filter-toolbar'><div role='group' aria-label='#=filterExpressionLabel#' class='k-toolbar' id='#=uid#'><div class='k-filter-toolbar-item k-filter-field'><select data-#=ns#bind='value: field' title='#=fieldsLabel#' class='k-filter-dropdown' data-auto-width='true' data-#=ns#role='dropdownlist'>#for(var current in fields){#<option value='#=fields[current].name#'>#=fields[current].label#</option>#}#</select></div><div class='k-filter-toolbar-item k-filter-operator'></div><div class='k-filter-toolbar-item k-filter-value'></div><div class='k-filter-toolbar-item'><button data-role='button' class='k-button k-button-md k-rounded-md k-button-flat k-button-flat-base k-icon-button' role='button' title='#=close#' aria-label='#=close#' aria-disabled='false' tabindex='0'><span class='k-button-icon k-icon k-i-close'></span></button></div></div></div></li>";!function(e){var t=window.kendo,i=t.ui,o=i.Widget,s=i.ButtonGroup,l="change",a=".kendoFilter",r="Is equal to",n="Is not equal to",d=s.extend({init:function(e,t){s.fn.init.call(this,e,t)},options:{name:"FilterButtonGroup"},value:function(e){if(void 0===e)return this._value;this._value=e,s.fn.select.call(this,this.wrapper.find("[value='"+e+"']")[0]),this.trigger(l)},select:function(t){-1!==t&&this.value(e(t).attr("value"))}}),p=o.extend({init:function(t,i){var s,l=this;o.fn.init.call(l,t,i),l.element=e(t).addClass("k-widget k-filter"),l.dataSource=i.dataSource,l.operators=e.extend(l.options.operators,i.operators),l._getFieldsInfo(),l._modelChangeHandler=l._modelChange.bind(l),l._renderMain(),i.expression&&l._addExpressionTree(l.filterModel),l._renderApplyButton(),l.options.expressionPreview&&(l._previewContainer||(l._previewContainer=e('<div class="k-filter-preview"></div>').insertAfter(l.element.children().eq(0))),s=l._createPreview(l.filterModel.toJSON()),l._previewContainer.html(s)),l._attachEvents(),l.hasCustomOperators()},events:[l],options:{name:"Filter",dataSource:null,expression:null,applyButton:!1,fields:[],mainLogic:"and",messages:{and:"And",or:"Or",apply:"Apply",close:"Close",addExpression:"Add Expression",fields:"Fields",filterExpressionLabel:"filter expression",filterLogicLabel:"filter logic",mainFilterLogicLabel:"main filter logic",operators:"Operators",addGroup:"Add Group"},operators:{string:{eq:r,neq:n,startswith:"Starts with",contains:"Contains",doesnotcontain:"Does not contain",endswith:"Ends with",isnull:"Is null",isnotnull:"Is not null",isempty:"Is empty",isnotempty:"Is not empty",isnullorempty:"Has no value",isnotnullorempty:"Has value"},number:{eq:r,neq:n,gte:"Is greater than or equal to",gt:"Is greater than",lte:"Is less than or equal to",lt:"Is less than",isnull:"Is null",isnotnull:"Is not null"},date:{eq:r,neq:n,gte:"Is after or equal to",gt:"Is after",lte:"Is before or equal to",lt:"Is before",isnull:"Is null",isnotnull:"Is not null"},boolean:{eq:r,neq:n}}},applyFilter:function(){var e=this.filterModel.toJSON();this._hasCustomOperators&&this._mapOperators(e),this._hasFieldsFilter(e.filters||[])?(this._removeEmptyGroups(e.filters),this.dataSource.filter(e)):this.dataSource.filter({})},destroy:function(){this.element.off(a),t.destroy(this.element.find(".k-filter-group-main")),this._previewContainer=null,this._applyButton=null,this._modelChangeHandler=null,o.fn.destroy.call(this)},setOptions:function(e){t.deepExtend(this.options,e),this.destroy(),this.element.empty(),this.init(this.element,this.options)},getOptions:function(){var t=e.extend(!0,{},this.options);return delete t.dataSource,t.expression=this.filterModel.toJSON(),t},_addExpressionTree:function(e){if(e.filters)for(var t=this.element.find("[id="+e.uid+"]"),i=0;i<e.filters.length;i++)e.filters[i].logic?this._addGroup(t,e.filters[i]):this._addExpression(t,e.filters[i]),e.filters[i].filters&&this._addExpressionTree(e.filters[i])},_attachEvents:function(){var t=this;t.element.on("click"+a,"button.k-button",(function(i){i.preventDefault();var o=e(i.currentTarget),s=o.find("span"),l=(s.length?s:o).attr("class").split("-").pop();"close"==l?t._removeExpression(o.closest(".k-toolbar")):"expression"==l?t._addExpression(o.closest(".k-toolbar")):"group"==l?t._addGroup(o.closest(".k-toolbar")):"apply"==l&&t.applyFilter()}))},_addExpression:function(i,o){var s,l=this,a=i.attr("id"),r=i.closest(".k-filter-toolbar").next("ul.k-filter-lines"),n=o?l._fields[o.field]:l._defaultField,d="";o?s=o:((s=f(l.filterModel,a)).filters||s.set("filters",[]),s=l._addNewModel(s.filters,n)),r.length||(r=e("<ul class='k-filter-lines'></ul>").appendTo(i.closest("li"))),d=e(t.template(expressionItemTemplate)({fields:l._fields,operators:l.operators[n.type],close:l.options.messages.close,fieldsLabel:l.options.messages.fields,uid:s.uid,ns:t.ns,filterExpressionLabel:l.options.messages.filterExpressionLabel})).appendTo(r),l._addExpressionControls(d.find(".k-toolbar"),n,s),o||l._expressionChange()},_addExpressionControls:function(e,i,o){var s=e.find(".k-filter-toolbar-item"),l=s.eq(1),a=s.eq(2);t.destroy(l),t.destroy(a),l.empty(),a.empty(),this._appendOperators(l,i),this._appendEditor(a,i),this._bindModel(e,o),this._showHideEditor(e,o)},_appendOperators:function(i,o){e(t.template(operatorsTemplate)({operators:o.operators&&o.operators[o.type]?o.operators[o.type]:this.operators[o.type],operatorsLabel:this.options.messages.operators,ns:t.ns})).appendTo(i)},_appendEditor:function(i,o){t.isFunction(o.editor)?o.editor(i,e.extend(!0,{},{field:o.name})):e(t.template(o.editor)({ns:t.ns,field:o.name,id:t.guid()})).appendTo(i)},_addNewModel:function(e,t){var i,o,s=t.type,l=t.operators;return l||(l=this.options.operators),o=Object.keys(l[s])[0],e.push({field:t.name}),(i=e[e.length-1]).set("value",t.defaultValue),i.set("operator",o),i},_addGroup:function(i,o){var s,l=this,a=l.filterModel,r=i.attr("id"),n=i.closest(".k-filter-toolbar").next("ul.k-filter-lines");o?a=o:((a=f(a,r)).filters||a.set("filters",[]),a.filters.push({logic:l.options.mainLogic}),a=a.filters[a.filters.length-1]),n.length||(n=e("<ul class='k-filter-lines'></ul>").appendTo(i.closest("li"))),s=e(t.template(logicItemTemplate)({operators:{and:l.options.messages.and,or:l.options.messages.or},addExpression:l.options.messages.addExpression,addGroup:l.options.messages.addGroup,close:l.options.messages.close,ns:t.ns,filterLogicLabel:l.options.messages.filterLogicLabel})).appendTo(n),l._bindModel(s.find(".k-toolbar"),a),o||l._expressionChange()},_bindModel:function(e,i){e.attr("id",i.uid),i.bind("change",this._modelChangeHandler),t.bind(e,i),e.parent().attr(t.attr("stop"),!0)},_createPreview:function(e){var i,o,s="",l=!1,a=this._hasFieldsFilter(e.filters||[]),r="";if(!e.filters||!e.filters.length||!a)return"";s+='<span class="k-filter-preview-bracket">(</span>';for(var n=0;n<e.filters.length;n++)(i=e.filters[n]).filters&&((r=this._createPreview(i))&&(l&&(s+='<span class="k-filter-preview-operator"> '+e.logic.toLocaleUpperCase()+" </span>"),l=!0),s+=r),i.field&&(o=this._fields[i.field],l&&(s+='<span class="k-filter-preview-operator"> '+e.logic.toLocaleUpperCase()+" </span>"),l=!0,s+='<span class="k-filter-preview-field">'+o.label+"</span>",s+='<span class="k-filter-preview-criteria"> '+this._getOperatorText(i.field,i.operator),i.operator.indexOf("is")<0?(s+=" </span>",s+="<span class='k-filter-preview-value'>'"+t.htmlEncode(o.previewFormat?t.toString(i.value,o.previewFormat):i.value)+"'</span>"):s+="</span>");return s+='<span class="k-filter-preview-bracket">)</span>'},_expressionChange:function(){var e=this,t=e.filterModel.toJSON(),i="";e.options.expressionPreview&&(i=e._createPreview(t),e._previewContainer.html(i)),e.trigger(l,{expression:t})},_getOperatorText:function(e,t){var i=this._fields[e].type,o=this._fields[e].operators;return o||(o=this.options.operators),o[i][t].text||o[i][t]},_addField:function(t,i){var o=this;t=e.extend(!0,{},{name:t.name||i,editor:t.editorTemplate||editors[t.type||"string"],defaultValue:t.defaultValue||!1===t.defaultValue||0===t.defaultValue?t.defaultValue:defaultValues[t.type||"string"],type:t.type||"string",label:t.label||t.name||i,operators:t.operators,previewFormat:t.previewFormat}),o._fields[t.name]=t,o._defaultField||(o._defaultField=t)},_getFieldsInfo:function(){var e,t=this,i=t.options.fields.length?t.options.fields:(t.options.dataSource.options.schema.model||{}).fields;if(t._fields={},Array.isArray(i))for(var o=0;o<i.length;o++)e=i[o],t._addField(e);else for(var s in i)e=i[s],t._addField(e,s)},_hasFieldsFilter:function(e,t){t=!!t;for(var i=0;i<e.length;i++)if(e[i].filters&&(t=this._hasFieldsFilter(e[i].filters,t)),e[i].field)return!0;return t},_removeEmptyGroups:function(e){if(e)for(var t=e.length-1;t>=0;t--)e[t].logic&&!e[t].filters||e[t].filters&&!this._hasFieldsFilter(e[t].filters)?e.splice(t,1):e[t].filters&&this._removeEmptyGroups(e[t].filters)},_modelChange:function(e){var t=this,i=t.element.find("[id="+e.sender.uid+"]");if(t._showHideEditor(i,e.sender),"field"===e.field){var o=e.sender.field,s=e.sender.parent(),l=t._fields[o],a=t._addNewModel(s,l);e.sender.unbind("change",t._modelChangeHandler),s.remove(e.sender),t._addExpressionControls(i,l,a),t._expressionChange()}else"filters"!==e.field&&t._expressionChange()},_renderMain:function(){var i=this;e(mainContainer).appendTo(i.element),i.options.expression?i.filterModel=t.observable(i.options.expression):i.filterModel=t.observable({logic:i.options.mainLogic}),e(t.template(mainLogicTemplate)({operators:{and:i.options.messages.and,or:i.options.messages.or},addExpression:i.options.messages.addExpression,addGroup:i.options.messages.addGroup,close:i.options.messages.close,uid:i.filterModel.uid,ns:t.ns,mainFilterLogicLabel:i.options.messages.mainFilterLogicLabel})).appendTo(i.element.find("li").first()),i._bindModel(i.element.find(".k-toolbar").first(),i.filterModel)},_removeExpression:function(e){var i,o,s=this,l=e.attr("id"),a=e.closest("li");a.hasClass("k-filter-group-main")?(a=a.find(".k-filter-lines"),s.filterModel.filters&&(s.filterModel.filters.empty(),delete s.filterModel.filters)):(i=(o=f(s.filterModel,l)).parent(),o.unbind("change",s._modelChangeHandler),i.remove(o),i.length||delete i.parent().filters,a.siblings().length||(a=a.parent())),t.destroy(a),a.remove(),s._expressionChange()},_renderApplyButton:function(){var i=this;i.options.applyButton&&(i._applyButton||(i._applyButton=e(t.format('<button type="button" aria-label="{0}" title="{0}" class="k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-filter-apply">{0}</button>',i.options.messages.apply)).appendTo(i.element)))},_showHideEditor:function(e,t){if(!t.logic){var i=t.operator,o=e.find(".k-filter-toolbar-item").eq(2);"isnull"==i||"isnotnull"==i||"isempty"==i||"isnotempty"==i||"isnullorempty"==i||"isnotnullorempty"==i?o.hide():o.show()}},_mapOperators:function(e){var t=this;e.filters&&e.filters.forEach((function(e){if(e.filters)t._mapOperators(e);else{var i,o=t._fields[e.field],s=o.type;(i=o.operators&&o.operators[s][e.operator]?o.operators[s][e.operator]:t.operators[s][e.operator])&&(e.operator=i.handler||e.operator)}}))},hasCustomOperators:function(){var t=e.extend(!0,{},this.operators);for(var i in this._fields)t=e.extend(!0,{},t,this._fields[i].operators);this._hasCustomOperators=u(t)}});function u(e){for(var t in e){var i=e[t];if(i.handler&&"function"==typeof i.handler||"object"==typeof i&&null!==i&&u(i))return!0}return!1}function f(e,t){if(e.uid===t)return e;if(e.filters)for(var i=0;i<e.filters.length;i++){var o=f(e.filters[i],t);if(o)return o}}i.plugin(p),i.plugin(d)}(window.kendo.jQuery);
//# sourceMappingURL=kendo.filter.js.map