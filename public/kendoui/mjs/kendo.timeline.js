/**
 * Kendo UI v2022.3.1109 (http://www.telerik.com/kendo-ui)
 * Copyright 2022 Progress Software Corporation and/or one of its subsidiaries or affiliates. All rights reserved.
 *
 * Kendo UI commercial licenses may be obtained at
 * http://www.telerik.com/purchase/license-agreement/kendo-ui-complete
 * If you do not own a commercial license, this file shall be governed by the trial license terms.
 */
import"./kendo.fx.js";import"./kendo.data.js";import"./kendo.draganddrop.js";var __meta__={id:"timeline",name:"Timeline",category:"web",description:"The Kendo Timeline widget display events over time",depends:["userevents"]};!function(e,t){var a=window.kendo,i=a.ui.Widget,n=a.data.DataSource,r=a.effects.Transition,l=a.keys,d=Array.isArray,s="vertical",o="transitionEnd",c="k-timeline-flag-wrap",p="k-timeline-track-item",u="k-timeline-scrollable-wrap",m=".kendoTimeline",v="change";function f(e){var t=e.css("transform");return"none"!=t?t.match(/-?[\d\.]+/g)[4]/e.width()*100:0}function k(e,t){return e.offset().left-t.offset().left+e.width()/2}function h(e,t,a){e.css(t,a)}var g=a.Class.extend({init:function(t){this.cardContainer=e("<div class='k-card' />");var a,i=e("<div class='k-timeline-card'></div>").append(this.cardContainer);this.element=e("<li class='"+(a="timeline-event","k-"+a+"'></li>")).append(i),t.append(this.element)},content:function(t,a){var i=e("<span class='k-timeline-card-callout k-card-callout k-callout-n'></span>");this.cardContainer.html(t),this.cardContainer.append(i),this.element.attr("data-uid",a)},position:function(e){this.element.css("transform","translate3d("+this.element.width()*e+"px, 0, 0)")},setPageCallout:function(e,t){this.element.find(".k-timeline-card-callout").css(e,t)},destroy:function(){var e=this;e.cardContainer=null,e.element.remove(),e.element=null}}),_=a.Observable.extend({init:function(t,i){var n,l,d,s=this;a.Observable.fn.init.call(this),this.element=t,n=new a.ui.Movable(s.element),l=new r({axis:"x",movable:n,onEnd:function(){s.trigger(o)}}),d=[],e.extend(s,{duration:i&&i.duration||1,movable:n,transition:l,pages:d,eventTemplate:i.eventTemplate,eventHeight:i.eventHeight,dataFieldMappings:i.dataFieldMappings}),this.bind([o],i)},initPages:function(){for(var e,t=this.pages,a=this.element,i=0;i<3;i++)e=new g(a),t.push(e)},repositionPages:function(){var e=this.pages;e[0].position(-1),e[1].position(0),e[2].position(1)},setPageContent:function(e,t){var i,n=typeof this.eventTemplate===Function?this.eventTemplate:a.template(this.eventTemplate),r=this.dataFieldMappings;i=n({data:t,titleField:r.title,subtitleField:r.subtitle,descriptionField:r.description,imagesField:r.images,actionsField:r.actions,altField:r.altField}),e.content(i,t.uid)},updatePage:function(e,t,a){var i=this.pages,n=null===e?i[1]:e?i[i.length-1]:i[0];this.setPageContent(n,t),n.setPageCallout("left",a/n.element.width()*100+"%")},moveTo:function(e){this.movable.moveAxis("x",-e)},transitionTo:function(e,t){this.transition.moveTo({location:e,duration:this.duration,ease:t})},destroy:function(){for(var e=this,t=0;t<e.pages.length;t++)e.pages[t].destroy();e.unbind(),e.movable=e.transition=e.dataFieldMappings=e.eventTemplate=e.duration=e.pages=null}}),F=a.ui.Widget.extend({init:function(t,a){var n=this,r=a.orientation||n.options.orientation;i.fn.init.call(this,t,a),this.element.addClass(r===s?"k-timeline k-widget k-timeline-vertical":"k-timeline k-widget k-timeline-horizontal"),r!=s?n._horizontal():n._vertical(),this.element.on("click",".k-card-actions",(function(t){var a=e(t.target),i=e(t.target).closest(".k-timeline-event").data("uid"),r=n.dataSource.getByUid(i);n.trigger("actionClick",{sender:n,element:a,dataItem:r})})),n.currentEventIndex=0,n._forward=null,n._eventPage=1,n._currentIndex=0,n._firstIndexInView=0,n._initDataFieldMappings(),n.setDataSource(a.dataSource)},_horizontal:function(){var t=this,a=this.element,i=this.options,n=e("<div />"),r=e("<div />"),l=e("<ul />"),d=e("<div />"),s=e("<ul />");t._trackWrap=n,t._trackEl=r,t._scrollableWrap=l,t._eventsWrap=d,t._eventsList=s,n.addClass("k-timeline-track-wrap"),r.addClass("k-timeline-track"),l.addClass("k-timeline-scrollable-wrap"),d.addClass("k-timeline-events-list"),s.addClass("k-timeline-scrollable-wrap"),i.eventHeight&&s.height(i.eventHeight),r.append(l),n.append('<a class="k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-icon-button k-timeline-arrow k-timeline-arrow-left k-disabled" title="previous"><span class="k-button-icon k-icon k-i-arrow-60-left"></span></a><a class="k-button k-button-md k-rounded-md k-button-solid k-button-solid-base k-icon-button k-timeline-arrow k-timeline-arrow-right k-disabled" title="next"><span class="k-button-icon k-icon k-i-arrow-60-right"></span></a>'),n.append(r),d.append(s),n.appendTo(a),d.appendTo(a)},_vertical:function(){var t=this,a=this.options,i=this.element,n=t._eventsList=e("<ul />"),r=a.navigatable,d=a.collapsibleEvents;t.element.append(n),a.alternatingMode&&i.addClass("k-timeline-alternating"),d&&(i.addClass("k-timeline-collapsible"),this.element.on("click",".k-card-header",(function(){var a=e(this).closest(".k-timeline-card"),i=a.parent(),n=t.dataSource.getByUid(i.data("uid"));a.hasClass("k-collapsed")?t.trigger("expand",{sender:t,dataItem:n})||t.expand(i):t.trigger("collapse",{sender:t,dataItem:n})||t.collapse(i)}))),r&&d&&this.element.on("keydown"+m,t,(function(t){if(t.keyCode==l.SPACEBAR||t.keyCode==l.ENTER){var a=e(t.target).find(".k-card-header");a.length&&(t.preventDefault(),a.trigger("click"))}}))},_renderContentVertical:function(e){var t,i,n=this.options;i=typeof n.eventTemplate===Function?n.eventTemplate:n.eventTemplate?a.template(n.eventTemplate):a.template('# var titleField = data.titleField, subtitleField = data.subtitleField, descriptionField = data.descriptionField, imagesField = data.imagesField, navigatable = data.navigatable, collapsibleEvents = data.collapsibleEvents, actionsField = data.actionsField, altField = data.altField, data = data.data; #<div class="k-card-inner"><div class="k-card-header"><div class="k-card-title"># if(data[titleField]) { #<span class="k-event-title">#: data[titleField] #</span># } #<span class="k-event-collapse k-button k-button-md k-rounded-md k-button-flat k-button-flat-base k-icon-button"><span class="k-button-icon k-icon k-i-arrow-chevron-right"></span></span></div># if(data[subtitleField]) { #<div class="k-card-subtitle">#: data[subtitleField] #</div># } #</div><div class="k-card-body"><div class="k-card-description"># if(data[descriptionField]) { #<p>#: data[descriptionField] #</p># } ## if(data[imagesField] && data[imagesField].length > 0) { #<img src="#: data[imagesField][0].src #" #if(data[altField]){# alt="#:data[altField]#" #}# class="k-card-image" /># } #</div></div># if(data[actionsField] && data[actionsField].length > 0) { #<div class="k-card-actions"># for (var i = 0; i < data[actionsField].length; i++) { #<a class="k-button k-button-md k-rounded-md k-button-flat k-button-flat-primary" href="#: data[actionsField][i].url ? data[actionsField][i].url : "\\#" #"><span class="k-button-text">#: data[actionsField][i].text #</span></a># } #</div># } #</div>',{useWithBlock:!1}),t=a.template('# var itemTemplate = data.itemTemplate, dateField = data.dateField, titleField = data.titleField, descriptionField = data.descriptionField, subtitleField = data.subtitleField, imagesField = data.imagesField, actionsField = data.actionsField, alterMode = data.alterMode, collapsibleEvents = data.collapsibleEvents, dateFormat = data.dateFormat, showDateLabels = data.showDateLabels, navigatable = data.navigatable, altField = data.altField, data = data.data, counter = 0, year = 0, reverse = false;for (var i = 0; i < data.length; i++) {if(!(data[i][dateField] instanceof Date)) {continue;}var currentYear = data[i][dateField].getFullYear();if(currentYear != year) {year = currentYear; #<li class="k-timeline-flag-wrap"><span class="k-timeline-flag">#= year #</span></li># } reverse = counter % 2 === 0 && alterMode; #<li class="#= reverse ? \'k-timeline-event k-reverse\' : \'k-timeline-event\' #" data-uid="#: data[i].uid #"><div class="k-timeline-date-wrap"># if(showDateLabels) { #<div class="k-timeline-date-wrap"><span id="#:data[i].uid#-date" class="k-timeline-date">#= kendo.toString(data[i][dateField], dateFormat) #</span></div># } #</div><a class="k-timeline-circle"></a><div class="#= collapsibleEvents ? \'k-timeline-card k-collapsed\' : \'k-timeline-card\' #"><div class="k-card" #if (navigatable) {# aria-describedby="#:data[i].uid#-date" tabindex="0" role="button" aria-live="polite" aria-atomic="true"  #}#><span class="#= reverse ? \'k-timeline-card-callout k-card-callout k-callout-e\' : \'k-timeline-card-callout k-card-callout k-callout-w\' #"></span>#= itemTemplate({titleField: titleField, subtitleField: subtitleField, descriptionField: descriptionField, imagesField: imagesField, actionsField: actionsField, data: data[i], altField: altField, navigatable: navigatable, collapsibleEvents: collapsibleEvents}) #</div></div></li># counter ++;} #',{useWithBlock:!1})({data:e,dateField:n.dataDateField,titleField:n.dataTitleField,subtitleField:n.dataSubtitleField,descriptionField:n.dataDescriptionField,imagesField:n.dataImagesField,actionsField:n.dataActionsField,itemTemplate:i,alterMode:n.alternatingMode,collapsibleEvents:n.collapsibleEvents,dateFormat:n.dateFormat,showDateLabels:n.showDateLabels,altField:n.dataImagesAltField,navigatable:n.navigatable}),this._eventsList.html(t),n.eventWidth&&this.element.find(".k-card").width(n.eventWidth)},_renderContentHorizontal:function(t){var i,n,r=this,l=r.options,d=r._dataFieldMappings;n=typeof l.eventTemplate===Function?l.eventTemplate:l.eventTemplate?a.template(l.eventTemplate):a.template('# var titleField = data.titleField, subtitleField = data.subtitleField, descriptionField = data.descriptionField, imagesField = data.imagesField, actionsField = data.actionsField, altField = data.altField, data = data.data; #<div class="k-card-inner"><div class="k-card-header"># if(data[titleField]) { #<div class="k-card-title">#: data[titleField] #</div># }if(data[subtitleField]) { #<div class="k-card-subtitle">#: data[subtitleField] #</div># } #</div><div class="k-card-body"><div class="k-card-description"># if(data[descriptionField]) { #<p>#: data[descriptionField] #</p># }if(data[imagesField] && data[imagesField].length > 0) { #<img src="#: data[imagesField][0].src #"  #if(data[altField]){# alt="#:data[altField]#" #}# class="k-card-image" /># } #</div></div># if(data[actionsField] && data[actionsField].length > 0) { #<div class="k-card-actions"># for (var i = 0; i < data[actionsField].length; i++) { #<a class="k-button k-button-md k-rounded-md k-button-flat k-button-flat-primary" href="#: data[actionsField][i].url ? data[actionsField][i].url : "\\#" #"><span class="k-button-text">#: data[actionsField][i].text #</span></a># } #</div># } #</div>',{useWithBlock:!1}),i=a.template('# var itemTemplate = data.itemTemplate, dateField = data.dateField, dateFormat = data.dateFormat, showDateLabels = data.showDateLabels, data = data.data, year = 0; ## for (var i = 0; i < data.length; i++) {if(!(data[i][dateField] instanceof Date)) {continue;}var currentYear = data[i][dateField].getFullYear();if(year != currentYear) {year = currentYear; #<li class="k-timeline-track-item k-timeline-flag-wrap"><span class="k-timeline-flag">#= year #</span></li># } #<li class="k-timeline-track-item"><div class="k-timeline-date-wrap"># if(showDateLabels) { #<span class="k-timeline-date">#= kendo.toString(data[i][dateField], dateFormat) #</span># } #</div><a class="k-timeline-circle"></a></li># } #',{useWithBlock:!1})({data:t,itemTemplate:n,dateFormat:l.dateFormat,dateField:l.dataDateField,showDateLabels:l.showDateLabels}),l.initialEventIndex?r._trackWrap.append(e(i).find(".k-timeline-scrollable-wrap").css("transform","translateX(-100%)").parent()):r._scrollableWrap.html(i),r.pane&&r.pane.destroy(),r.pane=new _(r._eventsList,{transitionEnd:this._transitionEnd.bind(this),eventTemplate:n,dataFieldMappings:d,eventHeight:l.eventHeight})},_initDataFieldMappings:function(){var e=this.options;this._dataFieldMappings={title:e.dataTitleField,subtitle:e.dataSubtitleField,date:e.dataDateField,description:e.dataDescriptionField,images:e.dataImagesField,actions:e.dataActionsField,altField:e.dataImagesAltField}},_transitionEnd:function(){this._forward?this.pane.pages.push(this.pane.pages.shift()):this.pane.pages.unshift(this.pane.pages.pop()),this._forward=null,this.pane.repositionPages(),this.pane.movable.moveAxis("x",0),this.options.navigatable&&(this._transition=null,this._eventsList.find(".k-card").removeAttr("id"),this.pane.pages[1].cardContainer.attr("id",this._cardId),this._setCurrent(this._currentBullet)),this._animationInProgress=!1},_setCurrentEvent:function(t){var a,i=this,n=e(t.currentTarget),r=i.dataSource.view()[n.parent().children(":not(.k-timeline-flag-wrap)").index(n)];a=i._forward?i.pane.pages[2].element:i.pane.pages[0].element,i.trigger("change",{eventContainer:a,dataItem:r})||i.open(n)},open:function(t){var a,i=this,n=e(t),l=n.find(".k-timeline-circle"),d=n.parent().children(":not(.k-timeline-flag-wrap)"),s=d.index(n);this.options.navigatable&&(i._removeCurrent(),d.attr("aria-selected",!1),n.attr("aria-selected",!0),i._currentBullet=n);var o=i.dataSource.view()[s];i.currentEventIndex!==s&&(i._currentIndex=n.index(),a=i._forward=i.currentEventIndex<s,i.currentEventIndex=s,i.pane.updatePage(a,o,k(l,i._trackWrap)),i._forward?(clearTimeout(i.navigateTimeOut),i.navigateTimeOut=setTimeout((function(){i.pane.transition.moveTo({location:-i.pane.pages[2].element.width(),duration:800,ease:r.easeOutExpo})}),200)):(clearTimeout(i.navigateTimeOut),i.navigateTimeOut=setTimeout((function(){i.pane.transition.moveTo({location:i.pane.pages[0].element.width(),duration:800,ease:r.easeOutExpo})}),200)),i._repositionEvents())},_navigateToView:function(t){var a=this,i=e(t.currentTarget).hasClass("k-timeline-arrow-right")?1:-1;a.trigger("navigate",{sender:a,action:i>0?"next":"previous"})||a._animationInProgress||(a._animationInProgress=!0,i>0?a.next():a.previous(),a._updateArrows())},_updateArrows:function(){var e=this,t=e.element.find(".k-timeline-arrow"),a=t.filter(".k-timeline-arrow-left"),i=t.filter(".k-timeline-arrow-right");e._validateNavigation(!1)?a.addClass("k-disabled"):a.removeClass("k-disabled"),e._validateNavigation(!0)?i.addClass("k-disabled"):i.removeClass("k-disabled")},_validateNavigation:function(e){var t=this,a=t._end||0;return e?t._firstIndexInView+t.numOfEvents>=t.maxEvents:Math.abs(a)<=1},next:function(){var e=this,t=e.options;e._validateNavigation(!0)||t.orientation==s||(e._forward=!0,e._navigate()),e._updateArrows()},_navigate:function(){var t,a,i,n,l=this,d=l._forward,s=f(this._trackWrap.find("."+u)),o=d?-e("."+u).width():e("."+u).width(),v=l._currentIndex,h=l._firstIndexInView;if((s=d?s-100:s+100)>=0&&(s=0),l._end=s,l._tackItemWidth,n=Math.floor(v/l.numOfEvents),d?1===l.numOfEvents?(t=0===h?1:h,a=this._trackWrap.find("."+p).eq(t).nextAll(":not(."+c+")").first(),l._firstIndexInView=a.index()):(t=h+l.numOfEvents-1,a=this._trackWrap.find("."+p).eq(t).nextAll(":not(."+c+")").first(),l._firstIndexInView=h+l.numOfEvents):1===l.numOfEvents?(t=h,a=this._trackWrap.find("."+p).eq(t).prevAll(":not(."+c+")").first(),l._firstIndexInView=a.index()):(t=h,a=(a=this._trackWrap.find("."+p).eq(t).prevAll(":not(."+c+")").first()).length>0?a:this._trackWrap.find("."+p+":not(."+c+")").first(),l._firstIndexInView=h-l.numOfEvents<0?0:h-l.numOfEvents),i=l.dataSource.view()[a.index("li[class='k-timeline-track-item']")],this._trackWrap.find("."+u).css("transform","translateX("+s+"%)"),l._currentIndex!=a.index())l.currentEventIndex=a.index("li[class='k-timeline-track-item']"),l._currentIndex=a.index(),l.pane.updatePage(l._forward,i,0!==n||d?k(a.find(".k-timeline-circle"),l._trackWrap)+o:a.find(".k-timeline-circle").offset().left+15),clearTimeout(l.navigateTimeOut),l.navigateTimeOut=setTimeout((function(){d&&l.pane&&l.pane.pages.length>0?l.pane.transition.moveTo({location:-l.pane.pages[2].element.width(),duration:800,ease:r.easeOutExpo}):l.pane.transition.moveTo({location:l.pane.pages[0].element.width(),duration:800,ease:r.easeOutExpo})}),200);else{var g=this._trackWrap.find("."+u),_=function(){if(1!=l.numOfEvents){var e=l.pane.pages[1],t=k(a.find(".k-timeline-circle"),l._trackWrap);e.setPageCallout("left",t/e.element.width()*100+"%")}this._transition=null,g.off("transitionend"+m,_)};g.on("transitionend"+m,_)}},previous:function(){var e=this,t=e.options;e._validateNavigation(!1)||t.orientation==s||(e._forward=!1,e._navigate()),e._updateArrows()},expand:function(t){var i=this.options,n=e(t).find(".k-timeline-card"),r=e(t).find(".k-card"),l=e(t).find(".k-card-body");n.hasClass("k-collapsed")&&(i.navigatable&&i.collapsibleEvents&&r.attr("aria-expanded",!0),n.removeClass("k-collapsed"),a.fx(l).expand("vertical").stop().play())},collapse:function(t){var i=this.options,n=e(t).find(".k-timeline-card"),r=e(t).find(".k-card"),l=e(t).find(".k-card-body");n.hasClass("k-collapsed")||(i.navigatable&&i.collapsibleEvents&&r.attr("aria-expanded",!1),n.addClass("k-collapsed"),a.fx(l).expand("vertical").stop().reverse())},items:function(){return this.element.find("li[data-uid]")},_resizeHandler:function(){var e=this;clearTimeout(e.resizeTimeOut),e.resizeTimeOut=setTimeout((function(){e._redrawEvents(),e.pane.repositionPages()}))},redraw:function(){this.options.orientation!=s&&(this._redrawEvents(),this.pane.repositionPages())},_redrawEvents:function(){var e,t=this,a=Math.floor(t.element.find(".k-timeline-scrollable-wrap").width()/150);t.element.width()<=480?(t.element.addClass("k-timeline-mobile"),e=100,t.numOfEvents=1,t._tackItemWidth=e,t.element.find("li.k-timeline-track-item").css("flex","1 0 "+e+"%"),t._repositionEvents()):(t.element.removeClass("k-timeline-mobile"),a!=t.numOfEvents&&(t.numOfEvents=a,e=100/a,h(t.element.find("li.k-timeline-track-item"),"flex","1 0 "+e+"%"),t._tackItemWidth=e,t._repositionEvents())),t._updateArrows()},_repositionEvents:function(){var e,t,a,i=this,n=i._tackItemWidth,r=null===i._forward?i.pane.pages[1]:i._forward?i.pane.pages[2]:i.pane.pages[0],l=this._trackWrap.find("."+u),d=f(l);if(t=1===i.numOfEvents?i.currentEventIndex*n:i._currentIndex*n,r){if(1===i.numOfEvents)return r.setPageCallout("left","50%"),h(l,"transform","translateX(-"+(a=t)+"%)"),i._firstIndexInView=i._currentIndex,void i._updateArrows();t>=Math.abs(d)+100?(a=Math.abs(d)+(t-(Math.abs(d)+100)+n),i._end=-a,h(l,"transform","translateX(-"+a+"%)"),i._firstIndexInView=i._currentIndex-i.numOfEvents+1):t<=Math.abs(d)?(a=t,i._end=-a,h(l,"transform","translateX(-"+a+"%)"),i._firstIndexInView=i._currentIndex):(e=k(l.find("li.k-timeline-track-item").eq(i._currentIndex).find(".k-timeline-circle"),i._trackWrap),r.setPageCallout("left",e/r.element.width()*100+"%"),i._firstIndexInView=Math.round(Math.abs(d)/n));var s=this._trackWrap.find("."+u),o=function(){if(1!=i.numOfEvents){var e=i.pane.pages[1],t=k(i._trackWrap.find("."+p).eq(i._currentIndex).find(".k-timeline-circle"),i._trackWrap);e.setPageCallout("left",t/e.element.width()*100+"%")}s.off("transitionend"+m,o)};s.on("transitionend"+m,o)}i._updateArrows()},_initHorizontal:function(){var e=this,t=e._trackWrap.find(".k-timeline-circle").first(),i=e.dataSource.view()[0],n=e.options.navigatable;e.maxEvents=e._trackWrap.find(".k-timeline-track-item").length,e._currentIndex=1,e.pane.initPages(),e.pane.repositionPages(),e.pane.updatePage(e._forward,i,k(t,e._trackWrap)),e._updateArrows(),e._resizeHandlerBound=e._resizeHandler.bind(e),a.jQuery(window).on("resize"+m,e._resizeHandlerBound),e._trackWrap.on("click",".k-timeline-track-item:not(.k-timeline-flag-wrap)",e._setCurrentEvent.bind(e)),e._trackWrap.on("click",".k-timeline-arrow:not(.k-disabled)",e._navigateToView.bind(e)),n&&(e._trackWrap.find(".k-timeline-track-item.k-timeline-flag-wrap").attr("aria-hidden",!0),e._trackWrap.find(".k-timeline-track-item:not(.k-timeline-flag-wrap)").attr("role","option").attr("aria-selected",!1).first().attr("aria-selected",!0),e._cardId=a.guid(),e._scrollableWrap.attr("role","listbox").attr("aria-orientation","horizontal").attr("tabindex",0).on("focus"+m,(function(){e.pane.pages[1].cardContainer.attr("id",e._cardId),e._setCurrent(e._scrollableWrap.find(".k-timeline-track-item").eq(e._currentIndex))})).on("focusout"+m,(function(){e._removeCurrent()})).on("keydown"+m,(function(t){var a,i,n,r=e._currentBullet;e._transition||(t.keyCode==l.LEFT&&(a=!0,(n=r.prevAll(".k-timeline-track-item:not(.k-timeline-flag-wrap)").first()).length&&((i=k(n,e._trackWrap))<0||i>n.parent().width()?(e._transition=!0,e._removeCurrent(),e.previous(),e.open(n)):e._setCurrent(n))),t.keyCode==l.RIGHT&&(a=!0,(n=r.nextAll(".k-timeline-track-item:not(.k-timeline-flag-wrap)").first()).length&&((i=k(n,e._trackWrap))<0||i>n.parent().width()?(e._transition=!0,e._removeCurrent(),e.next(),e.open(n)):e._setCurrent(n))),t.keyCode!=l.SPACEBAR&&t.keyCode!=l.ENTER||(a=!0,e._currentBullet.trigger("click")),a&&t.preventDefault())})),e._ariaLabel(e._scrollableWrap))},_setCurrent:function(e){if(e){var t=a.guid(),i=this;i._removeCurrent(),i._scrollableWrap.attr("aria-activedescendant",t),e.attr("id",t).addClass("k-focus"),e.siblings().removeAttr("aria-describedby"),"true"===e.attr("aria-selected")&&e.attr("aria-describedby",i._cardId),i._currentBullet=e}},_removeCurrent:function(){this._currentBullet&&this._currentBullet.removeClass("k-focus").removeAttr("id").removeAttr("aria-describedby"),this._scrollableWrap.removeAttr("aria-activedescendant")},setDataSource:function(e){var t=this,a=t.options;e=d(e)?{data:e}:e,t.dataSource&&t._refresh?t.dataSource.unbind(v,t._refresh):this._refresh=t.refresh.bind(t),this.dataSource=n.create(e),undefined===this.dataSource._sort&&(this.dataSource._sort=[{field:a.dataDateField,dir:"asc"}]),t.dataSource.bind(v,t._refresh),a.autoBind&&this.dataSource.fetch()},refresh:function(){var e=this,t=e.options,a=this.dataSource.view();t.orientation!=s&&(e._trackWrap.empty().remove(),e.element.find(".k-timeline-events-list").remove(),e._horizontal()),e.currentEventIndex=0,e._forward=null,e._eventPage=1,e._currentIndex=0,e._firstIndexInView=0,e.numOfEvents=null,e._end=0,e._initDataFieldMappings(),a.length&&("horizontal"===t.orientation?(e._renderContentHorizontal(a),e._redrawEvents(),e._initHorizontal()):e._renderContentVertical(a)),e.trigger("dataBound",{sender:e})},destroy:function(){var t=this.options;i.fn.destroy.call(this),this.resizeTimeOut&&clearTimeout(this.resizeTimeOut),this.navigateTimeOut&&clearTimeout(this.navigateTimeOut),e(window).off("resize"+m,this._resizeHandlerBound),this._resizeHandlerBound=null,this.element.off(),t.orientation!=s&&(this.pane&&this.pane.destroy(),this._trackWrap.find("."+u).off(),this.element.find(".k-timeline-arrow").off(),this._trackWrap.off(),this.currentEventIndex=this.maxEvents=this.numOfEvents=this._currentIndex=this._eventPage=this._eventsList=this._eventsWrap=this.element=this._trackWrap=this.pane=null),a.destroy(this.element),this._dataFieldMappings=this.element=null},options:{autoBind:!0,name:"Timeline",orientation:"vertical",dateFormat:"MMM d, yyyy",showDateLabels:!0,collapsibleEvents:!1,alternatingMode:!1,dataTitleField:"title",dataDateField:"date",dataSubtitleField:"subtitle",dataDescriptionField:"description",dataImagesField:"images",dataActionsField:"actions",dataImagesAltField:"altField",navigatable:!1},events:["collapse","dataBound","expand","actionClick","change","navigate"]});a.ui.plugin(F)}(window.kendo.jQuery);
//# sourceMappingURL=kendo.timeline.js.map