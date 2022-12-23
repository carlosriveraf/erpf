/**
 * Kendo UI v2022.3.1109 (http://www.telerik.com/kendo-ui)
 * Copyright 2022 Progress Software Corporation and/or one of its subsidiaries or affiliates. All rights reserved.
 *
 * Kendo UI commercial licenses may be obtained at
 * http://www.telerik.com/purchase/license-agreement/kendo-ui-complete
 * If you do not own a commercial license, this file shall be governed by the trial license terms.
 */
import"./kendo.scheduler.view.js";var __meta__={id:"scheduler.agendaview",name:"Scheduler Agenda View",category:"web",description:"The Scheduler Agenda View",depends:["scheduler.view"],hidden:!0};!function(e){var t=window.kendo,s=t.ui,a=".kendoAgendaView",r="role",n=t.Class.extend({init:function(e){this._view=e},_getColumns:function(e,t){return e.concat(t)},_getGroupsInDay:function(){return[]},_getSumOfItemsForDate:function(){return 0},_renderTaskGroupsCells:function(e,t,s,a){var r=this._view;0===s&&0===a&&t.length&&r._renderTaskGroupsCells(e,t)},_renderDateCell:function(e,s,a,r,n,i){var o=this._view,l=o._isMobile();e.push(t.format('<td class="k-scheduler-datecolumn{3}{2}" rowspan="{0}">{1}</td>',a.length,o._dateTemplate({date:r,isMobile:l}),n!=i.length-1||s.length?"":" k-last",s.length?"":" k-first"))},_renderDates:function(){},_getParents:function(e){return e.splice(0)},_getGroupsByDate:function(){},_renderTaskGroups:function(e,t,s){var a=this._view;e.append(a._renderTaskGroups(t,s))}}),i=t.Class.extend({init:function(e){this._view=e},_getColumns:function(e,t){if(this._view._isMobile())return e.concat(t);var s=t.slice(0,1),a=t.slice(1);return s.concat(e).concat(a)},_compareDateGroups:function(e,t,s){return e[s].text==t[s].text&&(0===s||this._compareDateGroups(e,t,s-1))},_getGroupsInDay:function(e,t){for(var s=[],a=null,r=0;r<e.length;r++)for(var n=0;n<e[r].items.length;n++){var i=0;if(0===s.length)for(;i<t[r].length;i++)s.push([1]);else for(;i<t[r].length;i++)if(this._compareDateGroups(t[r],a,i))s[i][s[i].length-1]++;else{for(var o=s[i][s[i].length-1]-1,l=0;l<o;l++)s[i].push(0);s[i].push(1)}a=t[r]}return s},_getSumOfItemsForDate:function(e){for(var t=0,s=0;s<e.length;s++)t+=e[s].items.length;return t},_renderTaskGroupsCells:function(e,s,a,r,n,i,o,l){var d=this._view,u=d._isMobile();if(u)0===a&&0===r&&s.length&&d._renderTaskGroupsCells(e,s);else{0===a&&0===r&&e.push(t.format('<td class="k-scheduler-datecolumn k-first" rowspan="{0}">{1}</td>',i,d._dateTemplate({date:o,isMobile:u})));for(var c=0;c<s[a].length;c++)n[c][l]&&e.push(t.format('<td class="k-scheduler-groupcolumn" rowspan="{0}">{1}</td>',n[c][l],d._groupTemplate({value:s[a][c].text,isMobile:u}),s[a][c].className))}},_renderDateCell:function(){},_renderDates:function(e){for(var t=this._view,s=t._groupsByDate.sort((function(e,t){return e.array[0].value.getTime()-t.array[0].value.getTime()})),a=0;a<s.length;a++)e.append(t._renderTaskGroups(s[a].array,s[a].groups))},_getParents:function(e){return e.slice(0)},_getGroupsByDate:function(e,t,s){var a=this._view;if(e[t].items)for(var r=0;r<e[t].items.length;r++){for(var n=e[t].items[r].value,i=!1,o=0;o<a._groupsByDate.length;o++)a._groupsByDate[o].array[0].value.getTime()===n.getTime()&&(i=!0,a._groupsByDate[o].array.push(e[t].items[r]),a._groupsByDate[o].groups.push(s));i||a._groupsByDate.push({array:[e[t].items[r]],groups:[s]})}},_renderTaskGroups:function(){}});function o(e){for(var t=0,s=0,a=e.length;s<a;s++)t+=e[s].items.length;return t}function l(e,s){return e.valuePrimitive&&(s=t.getter(e.dataValueField)(s)),s}function d(e){for(var t=[].concat(e),s=t.shift(),a=[],r=[].push;s;)s.groups?r.apply(t,s.groups):s.items?r.apply(t,s.items):r.call(a,s),s=t.shift();return a}t.ui.scheduler.AgendaGroupedView=n,t.ui.scheduler.AgendaGroupedByDateView=i,s.AgendaView=s.SchedulerView.extend({init:function(r,n){s.SchedulerView.fn.init.call(this,r,n),this._groupedView=this._getGroupedView(),(n=this.options).editable&&(n.editable=e.extend({delete:!0},n.editable,{create:!1,update:!1},{messages:n.messages})),this.title=n.title,this._eventTemplate=this._eventTmpl(n.eventTemplate,'<div class="k-task" title="#:(data.title || "").replace(/"/g,"\'")#" data-#=kendo.ns#uid="#=uid#"># if (resources[0]) {#<span class="k-scheduler-mark" style="background-color:#=resources[0].color#"></span># } ## if (data.isException()) { #<span class="k-icon k-i-non-recurrence"></span># } else if (data.isRecurring()) {#<span class="k-icon k-i-reload"></span># } #<span class="k-scheduler-task-text">{0}</span>#if (showDelete) {#<a href="\\#" class="k-link k-event-delete" title="${data.messages.destroy}" aria-label="${data.messages.destroy}"><span class="k-icon k-i-close"></span></a>#}#</div>'),this._dateTemplate=t.template(n.eventDateTemplate),this._groupTemplate=t.template(n.eventGroupTemplate),this._timeTemplate=t.template(n.eventTimeTemplate),this.element.on("mouseenter"+a,".k-scheduler-agenda .k-scheduler-content tr","_mouseenter").on("mouseleave"+a,".k-scheduler-agenda .k-scheduler-content tr","_mouseleave").on("click"+a,".k-scheduler-agenda .k-scheduler-content .k-link:has(.k-i-close)","_remove"),this._renderLayout(n.date),this.refreshLayout()},name:"agenda",_aria:function(){var e=this.table;e.attr(r,"grid"),e.children("tbody").attr(r,"none"),e.find("table").attr(r,"none"),e.find("table > tbody").attr(r,"rowgroup"),e.find("table tr").attr(r,"row"),e.find("table td").attr(r,"gridcell"),e.find(".k-scheduler-header-wrap th").attr(r,"columnheader"),e.find(".k-scheduler-content .k-scheduler-datecolumn, .k-scheduler-content .k-scheduler-groupcolumn").attr(r,"rowheader")},clearSelection:function(){this.element.find(".k-selected").attr("aria-selected",!1),t.ui.SchedulerView.fn.clearSelection.call(this)},_isVirtualized:function(){return!1},_getGroupedView:function(){return this._isGroupedByDate()?new t.ui.scheduler.AgendaGroupedByDateView(this):new t.ui.scheduler.AgendaGroupedView(this)},_mouseenter:function(t){e(t.currentTarget).addClass("k-hover")},_mouseleave:function(t){e(t.currentTarget).removeClass("k-hover")},_remove:function(s){s.preventDefault(),this.trigger("remove",{uid:e(s.currentTarget).closest(".k-task").attr(t.attr("uid"))})},nextDate:function(){return t.date.nextDay(this.startDate())},startDate:function(){return this._startDate},endDate:function(){return this._endDate},previousDate:function(){return t.date.previousDay(this.startDate())},_renderLayout:function(e){this._startDate=e,this._endDate=t.date.addDays(e,7),this.createLayout(this._layout()),this._footer(),this.table.addClass("k-scheduler-agenda")},_layout:function(){var e=[{text:this.options.messages.time,className:"k-scheduler-timecolumn"},{text:this.options.messages.event}];this._isMobile()||e.splice(0,0,{text:this.options.messages.date,className:"k-scheduler-datecolumn"});var t=this.groupedResources;if(t.length){for(var s=[],a=0;a<t.length;a++)s.push({text:"",className:"k-scheduler-groupcolumn"});e=this._groupedView._getColumns(s,e)}return{columns:e}},_tasks:function(e){for(var s=[],a=0;a<e.length;a++){var r=e[a],n=r.start,i=r.isAllDay?t.date.getDate(r.end):r.end,o=t.date.getDate(n),l=6e4*(o.getTimezoneOffset()-i.getTimezoneOffset()),d=Math.ceil((i-o+l)/t.date.MS_PER_DAY);r.isAllDay&&(d+=1);var u=r.clone();if(u.startDate=t.date.getDate(n),u.startDate>=this.startDate()&&s.push(u),d>1){u.end=t.date.nextDay(n),u.head=!0;for(var c=1;c<d;c++)n=u.end,(u=r.clone()).start=u.startDate=t.date.getDate(n),u.end=t.date.nextDay(n),c==d-1?(u.end=new Date(u.start.getFullYear(),u.start.getMonth(),u.start.getDate(),i.getHours(),i.getMinutes(),i.getSeconds(),i.getMilliseconds()),u.tail=!0):(u.isAllDay=!0,u.middle=!0),(t.date.getDate(u.end)<=this.endDate()&&u.start>=this.startDate()||t.date.getDate(u.start).getTime()==this.endDate().getTime())&&s.push(u)}}return new t.data.Query(s).sort([{field:"start",dir:"asc"},{field:"end",dir:"asc"}]).groupBy({field:"startDate"}).toArray()},_renderTaskGroups:function(e,s){for(var a=[],r=this.options.editable,n=r&&!1!==r.destroy&&!this._isMobile(),i=this._isMobile(),o=this._groupedView._getSumOfItemsForDate(e),l=this._groupedView._getGroupsInDay(e,s),d=0,u=0;u<e.length;u++)for(var c=e[u].value,h=e[u].items,p=t.date.isToday(c),g=0;g<h.length;g++){var f=h[g],m=[],_=i?[]:m;this._groupedView._renderTaskGroupsCells(_,s,u,g,l,o,c,d),d++,0===g&&(i?(_.push(t.format('<td class="k-scheduler-datecolumn {1}" colspan="2">{0}</td>',this._dateTemplate({date:c,isMobile:i}),this.groupedResources.length?"":"k-first")),a.push('<tr role="row" aria-selected="false"'+(p?' class="k-today">':">")+_.join("")+"</tr>")):this._groupedView._renderDateCell(m,s,h,c,u,e)),f.head?f.format="{0:t}":f.tail?f.format="{1:t}":f.format="{0:t}-{1:t}",f.resources=this.eventResources(f),m.push(t.format('<td class="k-scheduler-timecolumn {4}"><div>{0}{1}{2}</div></td><td>{3}</td>',f.tail||f.middle?'<span class="k-icon k-i-arrow-60-left"></span>':"",this._timeTemplate(f.clone({start:f._startTime||f.start,end:f.endTime||f.end})),f.head||f.middle?'<span class="k-icon k-i-arrow-60-right"></span>':"",this._eventTemplate(f.clone({showDelete:n,messages:this.options.messages})),!this.groupedResources.length&&i?"k-first":"")),a.push('<tr role="row" aria-selected="false"'+(p?' class="k-today">':">")+m.join("")+"</tr>")}return a.join("")},_renderTaskGroupsCells:function(e,s){for(var a=this._isMobile(),r=0;r<s.length;r++)e.push(t.format('<td class="k-scheduler-groupcolumn{2}" rowspan="{0}">{1}</td>',s[r].rowSpan,this._groupTemplate({value:s[r].text,isMobile:a}),s[r].className))},render:function(t){var s=this.content.find("table").empty(),a=[];if(t.length>0){var r=this.groupedResources;s.append(e("<tbody>")),r.length?(a=this._createGroupConfiguration(t,r,null),this._groupsByDate=[],this._renderGroups(a,s.find("tbody"),[]),this._groupedView._renderDates(s.find("tbody"))):(a=this._tasks(t),s.find("tbody").append(this._renderTaskGroups(a,[])))}var n=this._eventsList=function(e){for(var t,s=0,a=e.length,r=[];s<a;s++)(t=e[s]).groups?(t=d(t.groups),r=r.concat(t)):r=r.concat(d(t.items));return r}(a);this._angularItems(s,n),this._aria(),this.refreshLayout(),this.trigger("activate")},_angularItems:function(e,s){this.angular("compile",(function(){var a=[];return{elements:s.map((function(s){return a.push({dataItem:s}),e.find(".k-task["+t.attr("uid")+"="+s.uid+"]")})),data:a}}))},_renderGroups:function(e,t,s){for(var a=0,r=e.length;a<r;a++){var n=this._groupedView._getParents(s);n.push(e[a]),this._groupedView._getGroupsByDate(e,a,n),e[a].groups?this._renderGroups(e[a].groups,t,n):this._groupedView._renderTaskGroups(t,e[a].items,n)}},_createGroupConfiguration:function(e,a,r){var n=a[0],i=[],d=n.dataSource.view(),u=this._isMobile();d=d.filter((function(e){var s=t.getter(n.dataParentValueField)(e);return null==s||r&&s===r.value}));for(var c=0;c<d.length;c++){var h=l(n,d[c]),p=new t.data.Query(e).filter({field:n.field,operator:s.SchedulerView.groupEqFilter(h)}).toArray();if(p.length){var g=this._tasks(p),f=r?"":" k-first";c===d.length-1&&(!r||r.className.indexOf("k-last")>-1)&&(f+=" k-last");var m={text:t.getter(n.dataTextField)(d[c]),value:h,rowSpan:0,className:f};if(a.length>1)m.groups=this._createGroupConfiguration(p,a.slice(1),m),r&&(r.rowSpan+=m.rowSpan);else{m.items=g;var _=o(m.items);u&&(_+=m.items.length),m.rowSpan=_,r&&(r.rowSpan+=_)}i.push(m)}}return i},_resourceBySlot:function(){return{}},selectionByElement:function(t){var s,a;if(!(t=e(t)).hasClass("k-scheduler-datecolumn")&&this._eventsList.length){if(t.is(".k-task")&&(t=t.closest("td")),this._isMobile()){var r=t.parent();s=r.parent().children().filter((function(){return e(this).children(":not(.k-scheduler-datecolumn, .k-scheduler-groupcolumn)").length})).index(r)}else s=t.parent().index();return{index:s,start:(a=this._eventsList[s]).start,end:a.end,isAllDay:a.isAllDay,uid:a.uid}}},select:function(e){this.clearSelection();var t=this.table.find(".k-task").eq(e.index).closest("tr").addClass("k-selected").attr("aria-selected",!0)[0];this.current(t)},move:function(e,s){var a=!1,r=e.index;if(s==t.keys.UP?(r--,a=!0):s==t.keys.DOWN&&(r++,a=!0),a){var n=this._eventsList[r];n&&(e.start=n.start,e.end=n.end,e.isAllDay=n.isAllDay,e.events=[n.uid],e.index=r)}return a},moveToEvent:function(){return!1},constrainSelection:function(e){var t=this._eventsList[0];t&&(e.start=t.start,e.end=t.end,e.isAllDay=t.isAllDay,e.events=[t.uid],e.index=0)},isInRange:function(){return!0},destroy:function(){this.element&&this.element.off(a),s.SchedulerView.fn.destroy.call(this)},options:{title:"Agenda",name:"agenda",editable:!0,selectedDateFormat:"{0:D}-{1:D}",selectedShortDateFormat:"{0:d} - {1:d}",selectedMobileDateFormat:"{0: MMM} {0:dd} - {1:dd}",eventTemplate:"#:title#",eventTimeTemplate:"#if(data.isAllDay) {##=this.options.messages.allDay##} else { ##=kendo.format(format, start, end)## } #",eventDateTemplate:'# if (!isMobile) { #<strong class="k-scheduler-agendaday">#=kendo.toString(date, "dd")#</strong><em class="k-scheduler-agendaweek">#=kendo.toString(date,"dddd")#</em><span class="k-scheduler-agendadate">#=kendo.toString(date, "y")#</span># } else { #<div class="k-scheduler-datecolumn-wrap"><span class="k-mobile-scheduler-agendadate"><span class="k-mobile-scheduler-agendaday">#=kendo.toString(date, "dd")#</span>&nbsp<span class="k-mobile-scheduler-agendamonth">#=kendo.toString(date, "MMMM")#</span></span><span class="k-mobile-scheduler-agendaweekday">#=kendo.toString(date, "dddd")#</span></div># } #',eventGroupTemplate:'# if (!isMobile) { #<strong class="k-scheduler-adgendagroup">#=value#</strong># } else { #<span class="k-scheduler-group-text">#=value#</span># } #',messages:{event:"Event",date:"Date",time:"Time",allDay:"all day"}}})}(window.kendo.jQuery);
//# sourceMappingURL=kendo.scheduler.agendaview.js.map
