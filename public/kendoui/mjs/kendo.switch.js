/**
 * Kendo UI v2022.3.1109 (http://www.telerik.com/kendo-ui)
 * Copyright 2022 Progress Software Corporation and/or one of its subsidiaries or affiliates. All rights reserved.
 *
 * Kendo UI commercial licenses may be obtained at
 * http://www.telerik.com/purchase/license-agreement/kendo-ui-complete
 * If you do not own a commercial license, this file shall be governed by the trial license terms.
 */
import"./kendo.core.js";var __meta__={id:"switch",name:"Switch",category:"web",description:"The Switch widget is used to display two exclusive choices.",depends:["core"]};!function(e,t){var a=window.kendo,s=a.ui,n=".kendoSwitch",c=s.Widget,i=a.support,r="change",d={widget:"k-switch",track:"k-switch-track",thumbWrapper:"k-switch-thumb-wrap",thumb:"k-switch-thumb",checked:"k-switch-on",checkedLabel:"k-switch-label-on",unchecked:"k-switch-off",uncheckedLabel:"k-switch-label-off",disabled:"k-disabled",readonly:"k-readonly",active:"k-active"},l="disabled",o="aria-disabled",p="readonly",h="aria-readonly",u="aria-hidden",k="checked",w=i.click+n,b=i.pointers?"pointerup":"touchend",f=".",y=a.template('<span class="#=styles.widget#" role="switch"></span>'),m=a.template("<span class='#=styles.track#'><span class='#=styles.checkedLabel#'>#=checked#</span><span class='#=styles.uncheckedLabel#'>#=unchecked#</span></span>"),g=a.template("<span class='#=styles.thumbWrapper#'><span class='#=styles.thumb#'></span></span>"),v=c.extend({init:function(e,t){var s=this;c.fn.init.call(s,e,t),s._wrapper(),s._initSettings(),s._aria(),s._attachEvents(),a.notify(s,a.ui)},_wrapper:function(){var t=this,a=t.options,s=t.element[0],n=e(y({styles:d}));s.type="checkbox",t.wrapper=t.element.wrap(n).parent(),t.wrapper[0].style.cssText=t.element[0].style.cssText,t.element.hide(),t.wrapper.append(e(m({styles:d,checked:a.messages.checked,unchecked:a.messages.unchecked}))).append(e(g({styles:d}))).addClass(s.className).removeClass("input-validation-error"),t.options.rounded=t.options.trackRounded,t._applyCssClasses(),t._applyRoundedClasses()},_applyRoundedClasses:function(e){var t=this,s=t.options,n=a.cssProperties.getValidClass({widget:s.name,propName:"rounded",value:s.trackRounded}),c=a.cssProperties.getValidClass({widget:s.name,propName:"rounded",value:s.thumbRounded});e=e||"addClass",t.wrapper.find(f+d.track)[e](n),t.wrapper.find(f+d.thumb)[e](c)},_attachEvents:function(){var e=this;e.wrapper.on(w,e._click.bind(e)).on(b,e._touchEnd.bind(e)).on("keydown.kendoSwitch",e._keydown.bind(e))},setOptions:function(a){var s=this,n=a.messages;s._clearCssClasses(a),s._applyRoundedClasses("removeClass"),s.options=e.extend(s.options,a),n&&n.checked!==t&&s.wrapper.find(f+d.checkedLabel).text(n.checked),n&&n.unchecked!==t&&s.wrapper.find(f+d.uncheckedLabel).text(n.unchecked),a.width&&s.wrapper.css({width:a.width}),a.enabled!==t&&s.enable(a.enabled),a.readonly!==t&&s.readonly(a.readonly),s.check(a.checked),s.options.rounded=s.options.trackRounded,s._applyCssClasses(),s._applyRoundedClasses()},_initSettings:function(){var e=this,t=e.element[0],a=e.options;a.enabled&&e._tabindex(),a.width&&e.wrapper.css({width:a.width}),null===a.checked&&(a.checked=t.checked),e.check(a.checked),a.enabled=a.enabled&&!e.element.attr(l),e.enable(a.enabled),a.readonly=a.readonly||!!e.element.attr(p),e.readonly(a.readonly)},_aria:function(){var t=this.element,s=this.wrapper,n=t.attr("id"),c=e('label[for="'+n+'"]'),i=t.attr("aria-label"),r=t.attr("aria-labelledby");if(i)s.attr("aria-label",i);else if(r)s.attr("aria-labelledby",r);else if(c.length){var d=c.attr("id");d||(d=(n||a.guid())+"_label",c.attr("id",d)),s.attr("aria-labelledby",d)}},events:[r],options:{name:"Switch",messages:{checked:"On",unchecked:"Off"},width:null,checked:null,enabled:!0,readonly:!1,size:"medium",rounded:"full",trackRounded:"full",thumbRounded:"full"},check:function(e){var a=this,s=a.element[0];if(e===t)return s.checked;s.checked!==e&&(a.options.checked=s.checked=e),a.wrapper.attr("aria-checked",e).toggleClass(d.checked,e).toggleClass(d.unchecked,!e).find("[aria-hidden='true']").removeAttr(u),e?(a.element.attr(k,k),a.wrapper.find(f+d.uncheckedLabel).attr(u,!0)):(a.element.prop(k,!1),a.wrapper.find(f+d.checkedLabel).attr(u,!0))},value:function(e){return"string"==typeof e?e="true"===e:null===e&&(e=!1),this.check.apply(this,[e])},destroy:function(){c.fn.destroy.call(this),this.wrapper.off(n)},toggle:function(){this.check(!this.element[0].checked)},enable:function(e){var t=this.element,a=this.wrapper;void 0===e&&(e=!0),this.options.enabled=e,e?(t.prop(l,!1),a.removeAttr(o)):(t.attr(l,l),a.attr(o,!0)),a.toggleClass(d.disabled,!e)},readonly:function(e){var t=this,a=t.element,s=t.wrapper;void 0===e&&(e=!0),t.options.readonly=e,e?(a.attr(p,!0),s.attr(h,!0)):(a.prop(p,!1),s.removeAttr(h)),s.toggleClass(d.readonly,e)},_check:function(){var e=this,t=e.element[0].checked=!e.element[0].checked;e.wrapper.trigger("focus"),!e.options.enabled||e.options.readonly||e.trigger(r,{checked:t})?e.element[0].checked=!t:e.check(t)},_keydown:function(e){e.keyCode===a.keys.SPACEBAR&&(this._check(),e.preventDefault())},_isTouch:function(e){return/touch/.test(e.type)||e.originalEvent&&/touch/.test(e.originalEvent.pointerType)},_click:function(e){this._isTouch(e)||1!==e.which||this._check()},_touchEnd:function(e){this._isTouch(e)&&(this._check(),e.preventDefault())}});a.cssProperties.registerPrefix("Switch","k-switch-"),a.cssProperties.registerValues("Switch",[{prop:"rounded",values:a.cssProperties.roundedValues.concat([["full","full"]])}]),s.plugin(v)}(window.kendo.jQuery);
//# sourceMappingURL=kendo.switch.js.map