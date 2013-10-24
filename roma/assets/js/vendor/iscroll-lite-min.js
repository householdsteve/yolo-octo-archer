/*! iScroll v5.0.0-beta.1 ~ (c) 2008-2013 Matteo Spinelli ~ http://cubiq.org/license */
var IScroll=function(t,i,s){function n(t,s){this.wrapper="string"==typeof t?i.querySelector(t):t,this.scroller=this.wrapper.children[0],this.scrollerStyle=this.scroller.style,this.options={startX:0,startY:0,scrollY:!0,lockDirection:!0,directionLockThreshold:5,momentum:!0,bounce:!0,bounceTime:600,bounceEasing:"",preventDefault:!0,HWCompositing:!0,useTransition:!0,useTransform:!0};for(var e in s)this.options[e]=s[e];this.translateZ=this.options.HWCompositing&&r.hasPerspective?" translateZ(0)":"",this.options.useTransition=r.hasTransition&&this.options.useTransition,this.options.useTransform=r.hasTransform&&this.options.useTransform,this.options.eventPassthrough=this.options.eventPassthrough===!0?"vertical":this.options.eventPassthrough,this.options.preventDefault=!this.options.eventPassthrough&&this.options.preventDefault,this.options.scrollY="vertical"==this.options.eventPassthrough?!1:this.options.scrollY,this.options.scrollX="horizontal"==this.options.eventPassthrough?!1:this.options.scrollX,this.options.lockDirection=this.options.lockDirection||this.options.eventPassthrough,this.options.directionLockThreshold=this.options.eventPassthrough?0:this.options.directionLockThreshold,this.options.bounceEasing="string"==typeof this.options.bounceEasing?r.ease[this.options.bounceEasing]||r.ease.circular:this.options.bounceEasing,this.options.tap===!0&&(this.options.tap="tap"),this.x=0,this.y=0,this._events={},this._init(),this.refresh(),this.scrollTo(this.options.startX,this.options.startY),this.enable()}var o=t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||t.msRequestAnimationFrame||function(i){t.setTimeout(i,1e3/60)},r=function(){function n(t){return h===!1?!1:""===h?t:h+t.charAt(0).toUpperCase()+t.substr(1)}var o={},r=i.createElement("div").style,h=function(){for(var t,i=["t","webkitT","MozT","msT","OT"],s=0,e=i.length;e>s;s++)if(t=i[s]+"ransform",t in r)return i[s].substr(0,i[s].length-1);return!1}();o.getTime=Date.now||function(){return(new Date).getTime()},o.extend=function(t,i){for(var s in i)t[s]=i[s]},o.addEvent=function(t,i,s,e){t.addEventListener(i,s,!!e)},o.removeEvent=function(t,i,s,e){t.removeEventListener(i,s,!!e)},o.momentum=function(t,i,e,n,o){var r,h,a=t-i,c=s.abs(a)/e,l=6e-4;return r=t+c*c/(2*l)*(0>a?-1:1),h=c/l,n>r?(r=o?n-o/2.5*(c/8):n,a=s.abs(r-t),h=a/c):r>0&&(r=o?o/2.5*(c/8):0,a=s.abs(t)+r,h=a/c),{destination:s.round(r),duration:h}};var a=n("transform");return o.extend(o,{hasTransform:a!==!1,hasPerspective:n("perspective")in r,hasTouch:"ontouchstart"in t,hasPointer:navigator.msPointerEnabled,hasTransition:n("transition")in r}),o.extend(o.style={},{transform:a,transitionTimingFunction:n("transitionTimingFunction"),transitionDuration:n("transitionDuration"),transformOrigin:n("transformOrigin")}),o.hasClass=function(t,i){var s=new RegExp("(^|\\s)"+i+"(\\s|$)");return s.test(t.className)},o.addClass=function(t,i){if(!o.hasClass(t,i)){var s=t.className.split(" ");s.push(i),t.className=s.join(" ")}},o.removeClass=function(t,i){if(o.hasClass(t,i)){var s=new RegExp("(^|\\s)"+i+"(\\s|$)","g");t.className=t.className.replace(s,"")}},o.offset=function(t){for(var i=-t.offsetLeft,s=-t.offsetTop;t=t.offsetParent;)i-=t.offsetLeft,s-=t.offsetTop;return{left:i,top:s}},o.extend(o.eventType={},{touchstart:1,touchmove:1,touchend:1,mousedown:2,mousemove:2,mouseup:2,MSPointerDown:3,MSPointerMove:3,MSPointerUp:3}),o.extend(o.ease={},{quadratic:{style:"cubic-bezier(0.25, 0.46, 0.45, 0.94)",fn:function(t){return t*(2-t)}},circular:{style:"cubic-bezier(0.1, 0.57, 0.1, 1)",fn:function(t){return s.sqrt(1- --t*t)}},back:{style:"cubic-bezier(0.175, 0.885, 0.32, 1.275)",fn:function(t){var i=4;return(t-=1)*t*((i+1)*t+i)+1}},bounce:{style:"",fn:function(t){return(t/=1)<1/2.75?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375}},elastic:{style:"",fn:function(t){return f=.22,e=.4,0===t?0:1==t?1:e*s.pow(2,-10*t)*s.sin((t-f/4)*2*s.PI/f)+1}}}),o.tap=function(t,s){var e=i.createEvent("Event");e.initEvent(s,!0,!0),e.pageX=t.pageX,e.pageY=t.pageY,t.target.dispatchEvent(e)},o.click=function(t){var s,e=t.target;"SELECT"!=e.tagName&&"INPUT"!=e.tagName&&"TEXTAREA"!=e.tagName&&(s=i.createEvent("MouseEvents"),s.initMouseEvent("click",!0,!0,t.view,1,e.screenX,e.screenY,e.clientX,e.clientY,t.ctrlKey,t.altKey,t.shiftKey,t.metaKey,0,null),s._constructed=!0,e.dispatchEvent(s))},o}();return n.prototype={version:"5.0.0-beta.1",_init:function(){this._initEvents()},destroy:function(){this._initEvents(!0),this._execEvent("destroy")},_transitionEnd:function(t){t.target==this.scroller&&(this._transitionTime(0),this.resetPosition(this.options.bounceTime)||this._execEvent("scrollEnd"))},_start:function(t){if(this.enabled&&(!this.initiated||r.eventType[t.type]===this.initiated)){this.options.preventDefault&&t.preventDefault();var i,e=t.touches?t.touches[0]:t;this.initiated=r.eventType[t.type],this.moved=!1,this.distX=0,this.distY=0,this.directionX=0,this.directionY=0,this.directionLocked=0,this._transitionTime(),this.isAnimating=!1,this.startTime=r.getTime(),this.options.useTransition&&this.isInTransition&&(i=this.getComputedPosition(),this._translate(s.round(i.x),s.round(i.y)),this.isInTransition=!1),this.startX=this.x,this.startY=this.y,this.absStartX=this.x,this.absStartY=this.y,this.pointX=e.pageX,this.pointY=e.pageY,this._execEvent("scrollStart")}},_move:function(t){if(this.enabled&&r.eventType[t.type]===this.initiated){this.options.preventDefault&&t.preventDefault();var i,e,n,o,h=t.touches?t.touches[0]:t,a=h.pageX-this.pointX,c=h.pageY-this.pointY,l=r.getTime();if(this.pointX=h.pageX,this.pointY=h.pageY,this.distX+=a,this.distY+=c,n=s.abs(this.distX),o=s.abs(this.distY),!(l-this.endTime>300&&10>n&&10>o)){if(!this.directionLocked&&this.options.lockDirection&&(this.directionLocked=n>o+this.options.directionLockThreshold?"h":o>=n+this.options.directionLockThreshold?"v":0),"h"==this.directionLocked){if("vertical"==this.options.eventPassthrough)t.preventDefault();else if("horizontal"==this.options.eventPassthrough)return this.initiated=!1,void 0;c=0}else if("v"==this.directionLocked){if("horizontal"==this.options.eventPassthrough)t.preventDefault();else if("vertical"==this.options.eventPassthrough)return this.initiated=!1,void 0;a=0}i=this.x+(this.hasHorizontalScroll?a:0),e=this.y+(this.hasVerticalScroll?c:0),(i>0||i<this.maxScrollX)&&(i=this.options.bounce?this.x+a/3:i>0?0:this.maxScrollX),(e>0||e<this.maxScrollY)&&(e=this.options.bounce?this.y+c/3:e>0?0:this.maxScrollY),this.directionX=a>0?-1:0>a?1:0,this.directionY=c>0?-1:0>c?1:0,this.moved=!0,this._translate(i,e),l-this.startTime>300&&(this.startTime=l,this.startX=this.x,this.startY=this.y)}}},_end:function(t){if(this.enabled&&r.eventType[t.type]===this.initiated){this.options.preventDefault&&t.preventDefault();var i,e,n=(t.changedTouches?t.changedTouches[0]:t,r.getTime()-this.startTime),o=s.round(this.x),h=s.round(this.y),a=0,c="";if(this.isInTransition=0,this.initiated=0,this.endTime=r.getTime(),!this.resetPosition(this.options.bounceTime)){if(!this.moved)return this.options.tap&&r.tap(t,this.options.tap),this.options.click&&r.click(t),void 0;if(this.options.momentum&&300>n&&(i=this.hasHorizontalScroll?r.momentum(this.x,this.startX,n,this.maxScrollX,this.options.bounce?this.wrapperWidth:0):{destination:o,duration:0},e=this.hasVerticalScroll?r.momentum(this.y,this.startY,n,this.maxScrollY,this.options.bounce?this.wrapperHeight:0):{destination:h,duration:0},o=i.destination,h=e.destination,a=s.max(i.duration,e.duration),this.isInTransition=1),this.options.snap){var l=this._nearestSnap(o,h);this.currentPage=l,o=l.x,h=l.y,a=this.options.snapSpeed||s.max(s.max(s.min(s.abs(o-this.x),1e3),s.min(s.abs(h-this.y),1e3)),300),c=this.options.bounceEasing}return o!=this.x||h!=this.y?((o>0||o<this.maxScrollX||h>0||h<this.maxScrollY)&&(c=r.ease.quadratic),this.scrollTo(o,h,a,c),void 0):(this._execEvent("scrollEnd"),void 0)}}},_resize:function(){var t=this;clearTimeout(this.resizeTimeout),this.resizeTimeout=setTimeout(function(){t.refresh(),t.resetPosition()},60)},resetPosition:function(t){if(this.x<=0&&this.x>=this.maxScrollX&&this.y<=0&&this.y>=this.maxScrollY)return!1;var i=this.x,s=this.y;return t=t||0,!this.hasHorizontalScroll||this.x>0?i=0:this.x<this.maxScrollX&&(i=this.maxScrollX),!this.hasVerticalScroll||this.y>0?s=0:this.y<this.maxScrollY&&(s=this.maxScrollY),this.scrollTo(i,s,t,this.options.bounceEasing),!0},disable:function(){this.enabled=!1},enable:function(){this.enabled=!0},refresh:function(){this.wrapper.offsetHeight,this.wrapperWidth=this.wrapper.clientWidth,this.wrapperHeight=this.wrapper.clientHeight,this.scrollerWidth=this.scroller.offsetWidth,this.scrollerHeight=this.scroller.offsetHeight,this.maxScrollX=this.wrapperWidth-this.scrollerWidth,this.maxScrollY=this.wrapperHeight-this.scrollerHeight,this.maxScrollX>0&&(this.maxScrollX=0),this.maxScrollY>0&&(this.maxScrollY=0),this.hasHorizontalScroll=this.options.scrollX&&this.maxScrollX<0,this.hasVerticalScroll=this.options.scrollY&&this.maxScrollY<0,this.endTime=0,this.wrapperOffset=r.offset(this.wrapper),this._execEvent("refresh")},on:function(t,i){this._events[t]||(this._events[t]=[]),this._events[t].push(i)},_execEvent:function(t){if(this._events[t]){var i=0,s=this._events[t].length;if(s)for(;s>i;i++)this._events[t][i].call(this)}},scrollBy:function(t,i,s,e){t=this.x+t,i=this.y+i,s=s||0,this.scrollTo(t,i,s,e)},scrollTo:function(t,i,s,e){e=e||r.ease.circular,!s||this.options.useTransition&&e.style?(this._transitionTimingFunction(e.style),this._transitionTime(s),this._translate(t,i)):this._animate(t,i,s,e.fn)},scrollToElement:function(t,i,e,n,o){if(t=t.nodeType?t:this.scroller.querySelector(t)){var h=r.offset(t);h.left-=this.wrapperOffset.left,h.top-=this.wrapperOffset.top,e===!0&&(e=s.round(t.offsetWidth/2-this.wrapper.offsetWidth/2)),n===!0&&(n=s.round(t.offsetHeight/2-this.wrapper.offsetHeight/2)),h.left-=e||0,h.top-=n||0,h.left=h.left>0?0:h.left<this.maxScrollX?this.maxScrollX:h.left,h.top=h.top>0?0:h.top<this.maxScrollY?this.maxScrollY:h.top,i=s.max(2*s.abs(h.left),2*s.abs(h.top)),this.scrollTo(h.left,h.top,i,o)}},_transitionTime:function(t){t=t||0,this.scrollerStyle[r.style.transitionDuration]=t+"ms"},_transitionTimingFunction:function(t){this.scrollerStyle[r.style.transitionTimingFunction]=t},_translate:function(t,i){this.options.useTransform?this.scrollerStyle[r.style.transform]="translate("+t+"px,"+i+"px)"+this.translateZ:(t=s.round(t),i=s.round(i),this.scrollerStyle.left=t+"px",this.scrollerStyle.top=i+"px"),this.x=t,this.y=i},_initEvents:function(i){var s=i?r.removeEvent:r.addEvent,e=this.options.bindToWrapper?this.wrapper:t;s(t,"orientationchange",this),s(t,"resize",this),s(this.wrapper,"mousedown",this),s(e,"mousemove",this),s(e,"mousecancel",this),s(e,"mouseup",this),r.hasPointer&&(s(this.wrapper,"MSPointerDown",this),s(e,"MSPointerMove",this),s(e,"MSPointerCancel",this),s(e,"MSPointerUp",this)),r.hasTouch&&(s(this.wrapper,"touchstart",this),s(e,"touchmove",this),s(e,"touchcancel",this),s(e,"touchend",this)),s(this.scroller,"transitionend",this),s(this.scroller,"webkitTransitionEnd",this),s(this.scroller,"oTransitionEnd",this),s(this.scroller,"MSTransitionEnd",this)},getComputedPosition:function(){var i,s,e=t.getComputedStyle(this.scroller,null);return this.options.useTransform?(e=e[r.style.transform].split(")")[0].split(", "),i=+(e[12]||e[4]),s=+(e[13]||e[5])):(i=+e.left.replace(/[^-\d]/g,""),s=+e.top.replace(/[^-\d]/g,"")),{x:i,y:s}},_animate:function(t,i,s,e){function n(){var p,f,m,d=r.getTime();return d>=u?(h.isAnimating=!1,h._translate(t,i),h.resetPosition(h.options.bounceTime),void 0):(d=(d-l)/s,m=e(d),p=(t-a)*m+a,f=(i-c)*m+c,h._translate(p,f),h.isAnimating&&o(n),void 0)}var h=this,a=this.x,c=this.y,l=r.getTime(),u=l+s;this.isAnimating=!0,n()},handleEvent:function(t){switch(t.type){case"touchstart":case"MSPointerDown":case"mousedown":this._start(t);break;case"touchmove":case"MSPointerMove":case"mousemove":this._move(t);break;case"touchend":case"MSPointerUp":case"mouseup":case"touchcancel":case"MSPointerCancel":case"mousecancel":this._end(t);break;case"orientationchange":case"resize":this._resize();break;case"transitionend":case"webkitTransitionEnd":case"oTransitionEnd":case"MSTransitionEnd":this._transitionEnd(t);break;case"DOMMouseScroll":case"mousewheel":this._wheel(t);break;case"keydown":this._key(t)}}},n.ease=r.ease,n}(window,document,Math);