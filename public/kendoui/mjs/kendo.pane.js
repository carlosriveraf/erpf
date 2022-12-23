/**
 * Kendo UI v2022.3.1109 (http://www.telerik.com/kendo-ui)
 * Copyright 2022 Progress Software Corporation and/or one of its subsidiaries or affiliates. All rights reserved.
 *
 * Kendo UI commercial licenses may be obtained at
 * http://www.telerik.com/purchase/license-agreement/kendo-ui-complete
 * If you do not own a commercial license, this file shall be governed by the trial license terms.
 */
import"./kendo.view.js";var __meta__={id:"pane",name:"Pane",category:"web",description:"Pane",depends:["view"],hidden:!0};!function(i,e){var t=window.kendo,n=t.roleSelector,o=t.ui,a=o.Widget,r=t.ViewEngine,s=t.View,l=i.extend,c="navigate",d="viewShow",h="sameViewRequested",p=t.support.mobileOS,v=p.ios&&!p.appMode&&p.flatVersion>=700,u="k-pane",w="k-pane-wrapper",g="k-collapsible-pane",f="k-vertical",y=a.extend({init:function(i,e){var n=this;a.fn.init.call(n,i,e),e=n.options,(i=n.element).addClass(u),n.options.collapsible&&i.addClass(g),this.history=[],this.historyCallback=function(i,e,t){var o=n.transition;return n.transition=null,v&&t&&(o="none"),n.viewEngine.showView(i,o,e)},this._historyNavigate=function(i){if("#:back"===i){if(1===n.history.length)return;n.history.pop(),i=n.history[n.history.length-1]}else i instanceof s&&(i=""),n.history.push(i);n.historyCallback(i,t.parseQueryStringParams(i))},this._historyReplace=function(i){var e=t.parseQueryStringParams(i);n.history[n.history.length-1]=i,n.historyCallback(i,e)},n.viewEngine=new r(l({},{container:i,transition:e.transition,modelScope:e.modelScope,rootNeeded:!e.initial,serverNavigation:e.serverNavigation,remoteViewURLPrefix:e.root||"",layout:e.layout,$angular:e.$angular,showStart:function(){n.closeActiveDialogs()},after:function(){},viewShow:function(i){n.trigger(d,i)},loadStart:function(){},loadComplete:function(){},sameViewRequested:function(){n.trigger(h)},viewTypeDetermined:function(i){i.remote&&n.options.serverNavigation||n.trigger(c,{url:i.url})}},this.options.viewEngine)),this._setPortraitWidth(),t.onResize((function(){n._setPortraitWidth()}))},closeActiveDialogs:function(){this.element.find(n("actionsheet popover modalview")).filter(":visible").each((function(){t.widgetInstance(i(this),o).close()}))},navigateToInitial:function(){var i=this.options.initial;return i&&this.navigate(i),i},options:{name:"Pane",portraitWidth:"",transition:"",layout:"",collapsible:!1,initial:null,modelScope:window},events:[c,d,h],append:function(i){return this.viewEngine.append(i)},destroy:function(){var i=this;a.fn.destroy.call(i),i.viewEngine&&i.viewEngine.destroy()},navigate:function(i,e){i instanceof s&&(i=i.id),this.transition=e,this._historyNavigate(i)},replace:function(i,e){i instanceof s&&(i=i.id),this.transition=e,this._historyReplace(i)},view:function(){return this.viewEngine.view()},_setPortraitWidth:function(){var i,e=this.options.portraitWidth;e&&(i=t.mobile.application.element.is("."+f)?e:"auto",this.element.css("width",i))}});y.wrap=function(i,e){i.is(n("view"))||(i=i.wrap("<div data-"+t.ns+'role="view" data-stretch="true"></div>').parent());var o=i.wrap('<div class="'+w+' k-widget"><div></div></div>').parent(),a=new y(o,e);return a.navigate(""),a},t.Pane=y}(window.kendo.jQuery);
//# sourceMappingURL=kendo.pane.js.map
