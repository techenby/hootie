var De=Object.create;var re=Object.defineProperty;var Me=Object.getOwnPropertyDescriptor;var Oe=Object.getOwnPropertyNames;var je=Object.getPrototypeOf,Be=Object.prototype.hasOwnProperty;var Xe=(v,h)=>()=>(h||v((h={exports:{}}).exports,h),h.exports);var Ue=(v,h,g,m)=>{if(h&&typeof h=="object"||typeof h=="function")for(let f of Oe(h))!Be.call(v,f)&&f!==g&&re(v,f,{get:()=>h[f],enumerable:!(m=Me(h,f))||m.enumerable});return v};var qe=(v,h,g)=>(g=v!=null?De(je(v)):{},Ue(h||!v||!v.__esModule?re(g,"default",{value:v,enumerable:!0}):g,v));var se=Xe((D,V)=>{(function(v,h){if(typeof D=="object"&&typeof V=="object")V.exports=h();else if(typeof define=="function"&&define.amd)define([],h);else{var g=h();for(var m in g)(typeof D=="object"?D:v)[m]=g[m]}})(window,function(){return function(v){var h={};function g(m){if(h[m])return h[m].exports;var f=h[m]={i:m,l:!1,exports:{}};return v[m].call(f.exports,f,f.exports,g),f.l=!0,f.exports}return g.m=v,g.c=h,g.d=function(m,f,F){g.o(m,f)||Object.defineProperty(m,f,{enumerable:!0,get:F})},g.r=function(m){typeof Symbol<"u"&&Symbol.toStringTag&&Object.defineProperty(m,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(m,"__esModule",{value:!0})},g.t=function(m,f){if(1&f&&(m=g(m)),8&f||4&f&&typeof m=="object"&&m&&m.__esModule)return m;var F=Object.create(null);if(g.r(F),Object.defineProperty(F,"default",{enumerable:!0,value:m}),2&f&&typeof m!="string")for(var P in m)g.d(F,P,function(T){return m[T]}.bind(null,P));return F},g.n=function(m){var f=m&&m.__esModule?function(){return m.default}:function(){return m};return g.d(f,"a",f),f},g.o=function(m,f){return Object.prototype.hasOwnProperty.call(m,f)},g.p="",g(g.s=0)}([function(v,h,g){"use strict";g.r(h);var m,f="fslightbox-",F="".concat(f,"styles"),P="".concat(f,"cursor-grabbing"),T="".concat(f,"full-dimension"),R="".concat(f,"flex-centered"),_="".concat(f,"open"),Y="".concat(f,"transform-transition"),M="".concat(f,"absoluted"),$="".concat(f,"slide-btn"),J="".concat($,"-container"),O="".concat(f,"fade-in"),j="".concat(f,"fade-out"),k=O+"-strong",G=j+"-strong",ce="".concat(f,"opacity-"),le="".concat(ce,"1"),H="".concat(f,"source");function K(t){return(K=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(e){return typeof e}:function(e){return e&&typeof Symbol=="function"&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(t)}function ue(t){var e=t.stageIndexes,o=t.core.stageManager,r=t.props.sources.length-1;o.getPreviousSlideIndex=function(){return e.current===0?r:e.current-1},o.getNextSlideIndex=function(){return e.current===r?0:e.current+1},o.updateStageIndexes=r===0?function(){}:r===1?function(){e.current===0?(e.next=1,delete e.previous):(e.previous=0,delete e.next)}:function(){e.previous=o.getPreviousSlideIndex(),e.next=o.getNextSlideIndex()},o.i=r<=2?function(){return!0}:function(n){var i=e.current;if(i===0&&n===r||i===r&&n===0)return!0;var a=i-n;return a===-1||a===0||a===1}}(typeof document>"u"?"undefined":K(document))==="object"&&((m=document.createElement("style")).className=F,m.appendChild(document.createTextNode(".fslightbox-absoluted{position:absolute;top:0;left:0}.fslightbox-fade-in{animation:fslightbox-fade-in .3s cubic-bezier(0,0,.7,1)}.fslightbox-fade-out{animation:fslightbox-fade-out .3s ease}.fslightbox-fade-in-strong{animation:fslightbox-fade-in-strong .3s cubic-bezier(0,0,.7,1)}.fslightbox-fade-out-strong{animation:fslightbox-fade-out-strong .3s ease}@keyframes fslightbox-fade-in{from{opacity:.65}to{opacity:1}}@keyframes fslightbox-fade-out{from{opacity:.35}to{opacity:0}}@keyframes fslightbox-fade-in-strong{from{opacity:.3}to{opacity:1}}@keyframes fslightbox-fade-out-strong{from{opacity:1}to{opacity:0}}.fslightbox-cursor-grabbing{cursor:grabbing}.fslightbox-full-dimension{width:100%;height:100%}.fslightbox-open{overflow:hidden;height:100%}.fslightbox-flex-centered{display:flex;justify-content:center;align-items:center}.fslightbox-opacity-0{opacity:0!important}.fslightbox-opacity-1{opacity:1!important}.fslightbox-scrollbarfix{padding-right:17px}.fslightbox-transform-transition{transition:transform .3s}.fslightbox-container{font-family:Arial,sans-serif;position:fixed;top:0;left:0;background:linear-gradient(rgba(30,30,30,.9),#000 1810%);touch-action:pinch-zoom;z-index:1000000000;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent}.fslightbox-container *{box-sizing:border-box}.fslightbox-svg-path{transition:fill .15s ease;fill:#ddd}.fslightbox-nav{height:45px;width:100%;position:absolute;top:0;left:0}.fslightbox-slide-number-container{display:flex;justify-content:center;align-items:center;position:relative;height:100%;font-size:15px;color:#d7d7d7;z-index:0;max-width:55px;text-align:left}.fslightbox-slide-number-container .fslightbox-flex-centered{height:100%}.fslightbox-slash{display:block;margin:0 5px;width:1px;height:12px;transform:rotate(15deg);background:#fff}.fslightbox-toolbar{position:absolute;z-index:3;right:0;top:0;height:100%;display:flex;background:rgba(35,35,35,.65)}.fslightbox-toolbar-button{height:100%;width:45px;cursor:pointer}.fslightbox-toolbar-button:hover .fslightbox-svg-path{fill:#fff}.fslightbox-slide-btn-container{display:flex;align-items:center;padding:12px 12px 12px 6px;position:absolute;top:50%;cursor:pointer;z-index:3;transform:translateY(-50%)}@media (min-width:476px){.fslightbox-slide-btn-container{padding:22px 22px 22px 6px}}@media (min-width:768px){.fslightbox-slide-btn-container{padding:30px 30px 30px 6px}}.fslightbox-slide-btn-container:hover .fslightbox-svg-path{fill:#f1f1f1}.fslightbox-slide-btn{padding:9px;font-size:26px;background:rgba(35,35,35,.65)}@media (min-width:768px){.fslightbox-slide-btn{padding:10px}}@media (min-width:1600px){.fslightbox-slide-btn{padding:11px}}.fslightbox-slide-btn-container-previous{left:0}@media (max-width:475.99px){.fslightbox-slide-btn-container-previous{padding-left:3px}}.fslightbox-slide-btn-container-next{right:0;padding-left:12px;padding-right:3px}@media (min-width:476px){.fslightbox-slide-btn-container-next{padding-left:22px}}@media (min-width:768px){.fslightbox-slide-btn-container-next{padding-left:30px}}@media (min-width:476px){.fslightbox-slide-btn-container-next{padding-right:6px}}.fslightbox-down-event-detector{position:absolute;z-index:1}.fslightbox-slide-swiping-hoverer{z-index:4}.fslightbox-invalid-file-wrapper{font-size:22px;color:#eaebeb;margin:auto}.fslightbox-video{object-fit:cover}.fslightbox-youtube-iframe{border:0}.fslightboxl{display:block;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:67px;height:67px}.fslightboxl div{box-sizing:border-box;display:block;position:absolute;width:54px;height:54px;margin:6px;border:5px solid;border-color:#999 transparent transparent transparent;border-radius:50%;animation:fslightboxl 1.2s cubic-bezier(.5,0,.5,1) infinite}.fslightboxl div:nth-child(1){animation-delay:-.45s}.fslightboxl div:nth-child(2){animation-delay:-.3s}.fslightboxl div:nth-child(3){animation-delay:-.15s}@keyframes fslightboxl{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.fslightbox-source{position:relative;z-index:2;opacity:0}")),document.head.appendChild(m));function de(t){var e,o=t.props,r=0,n={};this.getSourceTypeFromLocalStorageByUrl=function(a){return e[a]?e[a]:i(a)},this.handleReceivedSourceTypeForUrl=function(a,c){if(n[c]===!1&&(r--,a!=="invalid"?n[c]=a:delete n[c],r===0)){(function(s,l){for(var u in l)s[u]=l[u]})(e,n);try{localStorage.setItem("fslightbox-types",JSON.stringify(e))}catch{}}};var i=function(a){r++,n[a]=!1};if(o.disableLocalStorage)this.getSourceTypeFromLocalStorageByUrl=function(){},this.handleReceivedSourceTypeForUrl=function(){};else{try{e=JSON.parse(localStorage.getItem("fslightbox-types"))}catch{}e||(e={},this.getSourceTypeFromLocalStorageByUrl=i)}}function fe(t,e,o,r){var n=t.data,i=t.elements.sources,a=o/r,c=0;this.adjustSize=function(){if((c=n.maxSourceWidth/a)<n.maxSourceHeight)return o<n.maxSourceWidth&&(c=r),s();c=r>n.maxSourceHeight?n.maxSourceHeight:r,s()};var s=function(){i[e].style.width=c*a+"px",i[e].style.height=c+"px"}}function pe(t,e){var o=this,r=t.collections.sourceSizers,n=t.elements,i=n.sourceAnimationWrappers,a=n.sources,c=t.isl,s=t.resolve;function l(u,d){r[e]=s(fe,[e,u,d]),r[e].adjustSize()}this.runActions=function(u,d){c[e]=!0,a[e].classList.add(le),i[e].classList.add(k),i[e].removeChild(i[e].firstChild),l(u,d),o.runActions=l}}function he(t,e){var o,r=this,n=t.elements.sources,i=t.props,a=(0,t.resolve)(pe,[e]);this.handleImageLoad=function(c){var s=c.target,l=s.naturalWidth,u=s.naturalHeight;a.runActions(l,u)},this.handleVideoLoad=function(c){var s=c.target,l=s.videoWidth,u=s.videoHeight;o=!0,a.runActions(l,u)},this.handleNotMetaDatedVideoLoad=function(){o||r.handleYoutubeLoad()},this.handleYoutubeLoad=function(){var c=1920,s=1080;i.maxYoutubeDimensions&&(c=i.maxYoutubeDimensions.width,s=i.maxYoutubeDimensions.height),a.runActions(c,s)},this.handleCustomLoad=function(){var c=n[e],s=c.offsetWidth,l=c.offsetHeight;s&&l?a.runActions(s,l):setTimeout(r.handleCustomLoad)}}function W(t,e,o){var r=t.elements.sources,n=t.props.customClasses,i=n[e]?n[e]:"";r[e].className=o+" "+i}function B(t,e){var o=t.elements.sources,r=t.props.customAttributes;for(var n in r[e])o[e].setAttribute(n,r[e][n])}function me(t,e){var o=t.collections.sourceLoadHandlers,r=t.elements,n=r.sources,i=r.sourceAnimationWrappers,a=t.props.sources;n[e]=document.createElement("img"),W(t,e,H),n[e].src=a[e],n[e].onload=o[e].handleImageLoad,B(t,e),i[e].appendChild(n[e])}function ge(t,e){var o=t.collections.sourceLoadHandlers,r=t.elements,n=r.sources,i=r.sourceAnimationWrappers,a=t.props,c=a.sources,s=a.videosPosters;n[e]=document.createElement("video"),W(t,e,H),n[e].src=c[e],n[e].onloadedmetadata=function(u){o[e].handleVideoLoad(u)},n[e].controls=!0,B(t,e),s[e]&&(n[e].poster=s[e]);var l=document.createElement("source");l.src=c[e],n[e].appendChild(l),setTimeout(o[e].handleNotMetaDatedVideoLoad,3e3),i[e].appendChild(n[e])}function ve(t,e){var o=t.collections.sourceLoadHandlers,r=t.elements,n=r.sources,i=r.sourceAnimationWrappers,a=t.props.sources;n[e]=document.createElement("iframe"),W(t,e,"".concat(H," ").concat(f,"youtube-iframe"));var c=a[e],s=c.split("?")[1];n[e].src="https://www.youtube.com/embed/".concat(c.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/)[2],"?").concat(s||""),n[e].allowFullscreen=!0,B(t,e),i[e].appendChild(n[e]),o[e].handleYoutubeLoad()}function be(t,e){var o=t.collections.sourceLoadHandlers,r=t.elements,n=r.sources,i=r.sourceAnimationWrappers,a=t.props.sources;n[e]=a[e],W(t,e,"".concat(n[e].className," ").concat(H)),i[e].appendChild(n[e]),o[e].handleCustomLoad()}function xe(t,e){var o=t.elements,r=o.sources,n=o.sourceAnimationWrappers;t.props.sources,r[e]=document.createElement("div"),r[e].className="".concat(f,"invalid-file-wrapper ").concat(R),r[e].innerHTML="Invalid source",n[e].classList.add(k),n[e].removeChild(n[e].firstChild),n[e].appendChild(r[e])}function ye(t){var e=t.collections,o=e.sourceLoadHandlers,r=e.sourcesRenderFunctions,n=t.core.sourceDisplayFacade,i=t.resolve;this.runActionsForSourceTypeAndIndex=function(a,c){var s;switch(a!=="invalid"&&(o[c]=i(he,[c])),a){case"image":s=me;break;case"video":s=ge;break;case"youtube":s=ve;break;case"custom":s=be;break;default:s=xe}r[c]=function(){return s(t,c)},n.displaySourcesWhichShouldBeDisplayed()}}function we(){var t,e,o,r={isUrlYoutubeOne:function(i){var a=document.createElement("a");return a.href=i,a.hostname==="www.youtube.com"||a.hostname==="youtu.be"},getTypeFromResponseContentType:function(i){return i.slice(0,i.indexOf("/"))}};function n(){if(o.readyState!==4){if(o.readyState===2){var i;switch(r.getTypeFromResponseContentType(o.getResponseHeader("content-type"))){case"image":i="image";break;case"video":i="video";break;default:i="invalid"}o.onreadystatechange=null,o.abort(),e(i)}}else e("invalid")}this.setUrlToCheck=function(i){t=i},this.getSourceType=function(i){if(r.isUrlYoutubeOne(t))return i("youtube");e=i,(o=new XMLHttpRequest).onreadystatechange=n,o.open("GET",t,!0),o.send()}}function Se(t,e,o){var r=t.props,n=r.types,i=r.type,a=r.sources,c=t.resolve;this.getTypeSetByClientForIndex=function(s){var l;return n&&n[s]?l=n[s]:i&&(l=i),l},this.retrieveTypeWithXhrForIndex=function(s){var l=c(we);l.setUrlToCheck(a[s]),l.getSourceType(function(u){e.handleReceivedSourceTypeForUrl(u,a[s]),o.runActionsForSourceTypeAndIndex(u,s)})}}function Le(t,e){var o=t.core.stageManager,r=t.elements,n=r.smw,i=r.sourceWrappersContainer,a=t.props,c=0,s=document.createElement("div");function l(d){s.style.transform="translateX(".concat(d+c,"px)"),c=0}function u(){return(1+a.slideDistance)*innerWidth}s.className="".concat(M," ").concat(T," ").concat(R),s.s=function(){s.style.display="flex"},s.h=function(){s.style.display="none"},s.a=function(){s.classList.add(Y)},s.d=function(){s.classList.remove(Y)},s.n=function(){s.style.removeProperty("transform")},s.v=function(d){return c=d,s},s.ne=function(){l(-u())},s.z=function(){l(0)},s.p=function(){l(u())},o.i(e)||s.h(),n[e]=s,i.appendChild(s),function(d,p){var S=d.elements,y=S.smw,L=S.sourceAnimationWrappers,b=document.createElement("div"),w=document.createElement("div");w.className="fslightboxl";for(var x=0;x<3;x++){var E=document.createElement("div");w.appendChild(E)}b.appendChild(w),y[p].appendChild(b),L[p]=b}(t,e)}function X(t,e,o,r){var n=document.createElementNS("http://www.w3.org/2000/svg","svg");n.setAttributeNS(null,"width",e),n.setAttributeNS(null,"height",e),n.setAttributeNS(null,"viewBox",o);var i=document.createElementNS("http://www.w3.org/2000/svg","path");return i.setAttributeNS(null,"class","".concat(f,"svg-path")),i.setAttributeNS(null,"d",r),n.appendChild(i),t.appendChild(n),n}function Q(t,e){var o=document.createElement("div");return o.className="".concat(f,"toolbar-button ").concat(R),o.title=e,t.appendChild(o),o}function Ae(t,e){var o=document.createElement("div");o.className="".concat(f,"toolbar"),e.appendChild(o),function(r,n){var i=r.componentsServices,a=r.data,c=r.fs,s="M4.5 11H3v4h4v-1.5H4.5V11zM3 7h1.5V4.5H7V3H3v4zm10.5 6.5H11V15h4v-4h-1.5v2.5zM11 3v1.5h2.5V7H15V3h-4z",l=Q(n);l.title="Enter fullscreen";var u=X(l,"20px","0 0 18 18",s);i.ofs=function(){a.ifs=!0,l.title="Exit fullscreen",u.setAttributeNS(null,"width","24px"),u.setAttributeNS(null,"height","24px"),u.setAttributeNS(null,"viewBox","0 0 950 1024"),u.firstChild.setAttributeNS(null,"d","M682 342h128v84h-212v-212h84v128zM598 810v-212h212v84h-128v128h-84zM342 342v-128h84v212h-212v-84h128zM214 682v-84h212v212h-84v-128h-128z")},i.xfs=function(){a.ifs=!1,l.title="Enter fullscreen",u.setAttributeNS(null,"width","20px"),u.setAttributeNS(null,"height","20px"),u.setAttributeNS(null,"viewBox","0 0 18 18"),u.firstChild.setAttributeNS(null,"d",s)},l.onclick=c.t}(t,o),function(r,n){var i=Q(n,"Close");i.onclick=r.core.lightboxCloser.closeLightbox,X(i,"20px","0 0 24 24","M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z")}(t,o)}function Ce(t){var e=t.props.sources,o=t.elements.container,r=document.createElement("div");r.className="".concat(f,"nav"),o.appendChild(r),Ae(t,r),e.length>1&&function(n,i){var a=n.componentsServices,c=n.props.sources,s=(n.stageIndexes,document.createElement("div"));s.className="".concat(f,"slide-number-container");var l=document.createElement("div");l.className=R;var u=document.createElement("span");a.setSlideNumber=function(S){return u.innerHTML=S};var d=document.createElement("span");d.className="".concat(f,"slash");var p=document.createElement("div");p.innerHTML=c.length,s.appendChild(l),l.appendChild(u),l.appendChild(d),l.appendChild(p),i.appendChild(s),setTimeout(function(){l.offsetWidth>55&&(s.style.justifyContent="flex-start")})}(t,r)}function Z(t,e,o,r){var n=t.elements.container,i=o.charAt(0).toUpperCase()+o.slice(1),a=document.createElement("div");a.className="".concat(J," ").concat(J,"-").concat(o),a.title="".concat(i," slide"),a.onclick=e,function(c,s){var l=document.createElement("div");l.className="".concat($," ").concat(R),X(l,"20px","0 0 20 20",s),c.appendChild(l)}(a,r),n.appendChild(a)}function Ee(t){var e=t.core,o=e.lightboxCloser,r=e.slideChangeFacade,n=t.fs;this.listener=function(i){switch(i.key){case"Escape":o.closeLightbox();break;case"ArrowLeft":r.changeToPrevious();break;case"ArrowRight":r.changeToNext();break;case"F11":i.preventDefault(),n.t()}}}function Fe(t){var e=t.elements,o=t.sourcePointerProps,r=t.stageIndexes;function n(i,a){e.smw[i].v(o.swipedX)[a]()}this.runActionsForEvent=function(i){var a,c,s;e.container.contains(e.slideSwipingHoverer)||e.container.appendChild(e.slideSwipingHoverer),a=e.container,c=P,(s=a.classList).contains(c)||s.add(c),o.swipedX=i.screenX-o.downScreenX;var l=r.previous,u=r.next;n(r.current,"z"),l!==void 0&&o.swipedX>0?n(l,"ne"):u!==void 0&&o.swipedX<0&&n(u,"p")}}function Ie(t){var e=t.props.sources,o=t.resolve,r=t.sourcePointerProps,n=o(Fe);e.length===1?this.listener=function(){r.swipedX=1}:this.listener=function(i){r.isPointering&&n.runActionsForEvent(i)}}function Te(t){var e=t.core.slideIndexChanger,o=t.elements.smw,r=t.stageIndexes,n=t.sws;function i(c){var s=o[r.current];s.a(),s[c]()}function a(c,s){c!==void 0&&(o[c].s(),o[c][s]())}this.runPositiveSwipedXActions=function(){var c=r.previous;if(c===void 0)i("z");else{i("p");var s=r.next;e.changeTo(c);var l=r.previous;n.d(l),n.b(s),i("z"),a(l,"ne")}},this.runNegativeSwipedXActions=function(){var c=r.next;if(c===void 0)i("z");else{i("ne");var s=r.previous;e.changeTo(c);var l=r.next;n.d(l),n.b(s),i("z"),a(l,"p")}}}function ee(t,e){t.contains(e)&&t.removeChild(e)}function Ne(t){var e=t.core.lightboxCloser,o=t.elements,r=t.resolve,n=t.sourcePointerProps,i=r(Te);this.runNoSwipeActions=function(){ee(o.container,o.slideSwipingHoverer),n.isSourceDownEventTarget||e.closeLightbox(),n.isPointering=!1},this.runActions=function(){n.swipedX>0?i.runPositiveSwipedXActions():i.runNegativeSwipedXActions(),ee(o.container,o.slideSwipingHoverer),o.container.classList.remove(P),n.isPointering=!1}}function ze(t){var e=t.resolve,o=t.sourcePointerProps,r=e(Ne);this.listener=function(){o.isPointering&&(o.swipedX?r.runActions():r.runNoSwipeActions())}}function Pe(t){var e=this,o=t.core,r=o.eventsDispatcher,n=o.globalEventsController,i=o.scrollbarRecompensor,a=t.data,c=t.elements,s=t.fs,l=t.props,u=t.sourcePointerProps;this.isLightboxFadingOut=!1,this.runActions=function(){e.isLightboxFadingOut=!0,c.container.classList.add(G),n.removeListeners(),l.exitFullscreenOnClose&&a.ifs&&s.x(),setTimeout(function(){e.isLightboxFadingOut=!1,u.isPointering=!1,c.container.classList.remove(G),document.documentElement.classList.remove(_),i.removeRecompense(),document.body.removeChild(c.container),r.dispatch("onClose")},270)}}function U(t,e){var o=t.classList;o.contains(e)&&o.remove(e)}function Re(t){var e,o,r;o=(e=t).core.eventsDispatcher,r=e.props,o.dispatch=function(n){r[n]&&r[n]()},function(n){var i=n.componentsServices,a=n.data,c=n.fs,s=["fullscreenchange","webkitfullscreenchange","mozfullscreenchange","MSFullscreenChange"];function l(d){for(var p=0;p<s.length;p++)document[d](s[p],u)}function u(){document.fullscreenElement||document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement?i.ofs():i.xfs()}c.o=function(){i.ofs();var d=document.documentElement;d.requestFullscreen?d.requestFullscreen():d.mozRequestFullScreen?d.mozRequestFullScreen():d.webkitRequestFullscreen?d.webkitRequestFullscreen():d.msRequestFullscreen&&d.msRequestFullscreen()},c.x=function(){i.xfs(),document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen?document.webkitExitFullscreen():document.msExitFullscreen&&document.msExitFullscreen()},c.t=function(){a.ifs?c.x():c.o()},c.l=function(){l("addEventListener")},c.q=function(){l("removeEventListener")}}(t),function(n){var i=n.core,a=i.globalEventsController,c=i.windowResizeActioner,s=n.fs,l=n.resolve,u=l(Ee),d=l(Ie),p=l(ze);a.attachListeners=function(){document.addEventListener("pointermove",d.listener),document.addEventListener("pointerup",p.listener),addEventListener("resize",c.runActions),document.addEventListener("keydown",u.listener),s.l()},a.removeListeners=function(){document.removeEventListener("pointermove",d.listener),document.removeEventListener("pointerup",p.listener),removeEventListener("resize",c.runActions),document.removeEventListener("keydown",u.listener),s.q()}}(t),function(n){var i=n.core.lightboxCloser,a=(0,n.resolve)(Pe);i.closeLightbox=function(){a.isLightboxFadingOut||a.runActions()}}(t),function(n){var i=n.data,a=n.core.scrollbarRecompensor;function c(){document.body.offsetHeight>innerHeight&&(document.body.style.marginRight=i.scrollbarWidth+"px")}a.addRecompense=function(){document.readyState==="complete"?c():addEventListener("load",function(){c(),a.addRecompense=c})},a.removeRecompense=function(){document.body.style.removeProperty("margin-right")}}(t),function(n){var i=n.core,a=i.slideChangeFacade,c=i.slideIndexChanger,s=i.stageManager;n.props.sources.length>1?(a.changeToPrevious=function(){c.jumpTo(s.getPreviousSlideIndex())},a.changeToNext=function(){c.jumpTo(s.getNextSlideIndex())}):(a.changeToPrevious=function(){},a.changeToNext=function(){})}(t),function(n){var i=n.componentsServices,a=n.core,c=a.slideIndexChanger,s=a.sourceDisplayFacade,l=a.stageManager,u=n.elements,d=u.smw,p=u.sourceAnimationWrappers,S=n.isl,y=n.stageIndexes,L=n.sws;c.changeTo=function(b){y.current=b,l.updateStageIndexes(),i.setSlideNumber(b+1),s.displaySourcesWhichShouldBeDisplayed()},c.jumpTo=function(b){var w=y.previous,x=y.current,E=y.next,A=S[x],I=S[b];c.changeTo(b);for(var C=0;C<d.length;C++)d[C].d();L.d(x),L.c(),requestAnimationFrame(function(){requestAnimationFrame(function(){var N=y.previous,z=y.next;function ie(){l.i(x)?x===y.previous?d[x].ne():x===y.next&&d[x].p():(d[x].h(),d[x].n())}A&&p[x].classList.add(j),I&&p[y.current].classList.add(O),L.a(),N!==void 0&&N!==x&&d[N].ne(),d[y.current].n(),z!==void 0&&z!==x&&d[z].p(),L.b(w),L.b(E),S[x]?setTimeout(ie,260):ie()})})}}(t),function(n){var i=n.core.sourcesPointerDown,a=n.elements,c=a.smw,s=a.sources,l=n.sourcePointerProps,u=n.stageIndexes;i.listener=function(d){d.target.tagName!=="VIDEO"&&d.preventDefault(),l.isPointering=!0,l.downScreenX=d.screenX,l.swipedX=0;var p=s[u.current];p&&p.contains(d.target)?l.isSourceDownEventTarget=!0:l.isSourceDownEventTarget=!1;for(var S=0;S<c.length;S++)c[S].d()}}(t),function(n){var i=n.collections.sourcesRenderFunctions,a=n.core.sourceDisplayFacade,c=n.props,s=n.stageIndexes;function l(u){i[u]&&(i[u](),delete i[u])}a.displaySourcesWhichShouldBeDisplayed=function(){if(c.loadOnlyCurrentSource)l(s.current);else for(var u in s)l(s[u])}}(t),function(n){var i=n.core.stageManager,a=n.elements,c=a.smw,s=a.sourceAnimationWrappers,l=n.isl,u=n.stageIndexes,d=n.sws;d.a=function(){for(var p in u)c[u[p]].s()},d.b=function(p){p===void 0||i.i(p)||(c[p].h(),c[p].n())},d.c=function(){for(var p in u)d.d(u[p])},d.d=function(p){if(l[p]){var S=s[p];U(S,k),U(S,O),U(S,j)}}}(t),function(n){var i=n.collections.sourceSizers,a=n.core.windowResizeActioner,c=n.data,s=n.elements.smw,l=n.stageIndexes;a.runActions=function(){innerWidth<992?c.maxSourceWidth=innerWidth:c.maxSourceWidth=.9*innerWidth,c.maxSourceHeight=.9*innerHeight;for(var u=0;u<s.length;u++)s[u].d(),i[u]&&i[u].adjustSize();var d=l.previous,p=l.next;d!==void 0&&s[d].ne(),p!==void 0&&s[p].p()}}(t)}function ke(t){var e=t.componentsServices,o=t.core,r=o.eventsDispatcher,n=o.globalEventsController,i=o.scrollbarRecompensor,a=o.sourceDisplayFacade,c=o.stageManager,s=o.windowResizeActioner,l=t.data,u=t.elements,d=(t.props,t.stageIndexes),p=t.sws;function S(){var y,L;l.i=!0,l.scrollbarWidth=function(){var b=document.createElement("div"),w=b.style,x=document.createElement("div");w.visibility="hidden",w.width="100px",w.msOverflowStyle="scrollbar",w.overflow="scroll",x.style.width="100%",document.body.appendChild(b);var E=b.offsetWidth;b.appendChild(x);var A=x.offsetWidth;return document.body.removeChild(b),E-A}(),Re(t),u.container=document.createElement("div"),u.container.className="".concat(f,"container ").concat(T," ").concat(k),function(b){var w=b.elements;w.slideSwipingHoverer=document.createElement("div"),w.slideSwipingHoverer.className="".concat(f,"slide-swiping-hoverer ").concat(T," ").concat(M)}(t),Ce(t),function(b){var w=b.core.sourcesPointerDown,x=b.elements,E=b.props.sources,A=document.createElement("div");A.className="".concat(M," ").concat(T),x.container.appendChild(A),A.addEventListener("pointerdown",w.listener),x.sourceWrappersContainer=A;for(var I=0;I<E.length;I++)Le(b,I)}(t),t.props.sources.length>1&&(L=(y=t).core.slideChangeFacade,Z(y,L.changeToPrevious,"previous","M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788S18.707,9.212,18.271,9.212z"),Z(y,L.changeToNext,"next","M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788S1.293,9.212,1.729,9.212z")),function(b){for(var w=b.props.sources,x=b.resolve,E=x(de),A=x(ye),I=x(Se,[E,A]),C=0;C<w.length;C++)if(typeof w[C]=="string"){var N=I.getTypeSetByClientForIndex(C);if(N)A.runActionsForSourceTypeAndIndex(N,C);else{var z=E.getSourceTypeFromLocalStorageByUrl(w[C]);z?A.runActionsForSourceTypeAndIndex(z,C):I.retrieveTypeWithXhrForIndex(C)}}else A.runActionsForSourceTypeAndIndex("custom",C)}(t),r.dispatch("onInit")}t.open=function(){var y=arguments.length>0&&arguments[0]!==void 0?arguments[0]:0,L=d.previous,b=d.current,w=d.next;d.current=y,l.i||ue(t),c.updateStageIndexes(),l.i?(p.c(),p.a(),p.b(L),p.b(b),p.b(w),r.dispatch("onShow")):S(),a.displaySourcesWhichShouldBeDisplayed(),e.setSlideNumber(y+1),document.body.appendChild(u.container),document.documentElement.classList.add(_),i.addRecompense(),n.attachListeners(),s.runActions(),u.smw[d.current].n(),r.dispatch("onOpen")}}function te(t,e,o){return(te=He()?Reflect.construct.bind():function(r,n,i){var a=[null];a.push.apply(a,n);var c=new(Function.bind.apply(r,a));return i&&ne(c,i.prototype),c}).apply(null,arguments)}function He(){if(typeof Reflect>"u"||!Reflect.construct||Reflect.construct.sham)return!1;if(typeof Proxy=="function")return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],function(){})),!0}catch{return!1}}function ne(t,e){return(ne=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(o,r){return o.__proto__=r,o})(t,e)}function We(t){return function(e){if(Array.isArray(e))return q(e)}(t)||function(e){if(typeof Symbol<"u"&&e[Symbol.iterator]!=null||e["@@iterator"]!=null)return Array.from(e)}(t)||function(e,o){if(e){if(typeof e=="string")return q(e,o);var r=Object.prototype.toString.call(e).slice(8,-1);if(r==="Object"&&e.constructor&&(r=e.constructor.name),r==="Map"||r==="Set")return Array.from(e);if(r==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return q(e,o)}}(t)||function(){throw new TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}()}function q(t,e){(e==null||e>t.length)&&(e=t.length);for(var o=0,r=new Array(e);o<e;o++)r[o]=t[o];return r}function oe(){for(var t=document.getElementsByTagName("a"),e=function(n){if(!t[n].hasAttribute("data-fslightbox"))return"continue";var i=t[n].hasAttribute("data-href")?t[n].getAttribute("data-href"):t[n].getAttribute("href");if(!i)return console.warn('The "data-fslightbox" attribute was set without the "href" attribute.'),"continue";var a=t[n].getAttribute("data-fslightbox");fsLightboxInstances[a]||(fsLightboxInstances[a]=new FsLightbox);var c=null;i.charAt(0)==="#"?(c=document.getElementById(i.substring(1)).cloneNode(!0)).removeAttribute("id"):c=i,fsLightboxInstances[a].props.sources.push(c),fsLightboxInstances[a].elements.a.push(t[n]);var s=fsLightboxInstances[a].props.sources.length-1;t[n].onclick=function(L){L.preventDefault(),fsLightboxInstances[a].open(s)},y("types","data-type"),y("videosPosters","data-video-poster"),y("customClasses","data-class"),y("customClasses","data-custom-class");for(var l=["href","data-fslightbox","data-href","data-type","data-video-poster","data-class","data-custom-class"],u=t[n].attributes,d=fsLightboxInstances[a].props.customAttributes,p=0;p<u.length;p++)if(l.indexOf(u[p].name)===-1&&u[p].name.substr(0,5)==="data-"){d[s]||(d[s]={});var S=u[p].name.substr(5);d[s][S]=u[p].value}function y(L,b){t[n].hasAttribute(b)&&(fsLightboxInstances[a].props[L][s]=t[n].getAttribute(b))}},o=0;o<t.length;o++)e(o);var r=Object.keys(fsLightboxInstances);window.fsLightbox=fsLightboxInstances[r[r.length-1]]}window.FsLightbox=function(){var t=this;this.props={sources:[],customAttributes:[],customClasses:[],types:[],videosPosters:[],slideDistance:.3},this.data={isFullscreenOpen:!1,maxSourceWidth:0,maxSourceHeight:0,scrollbarWidth:0},this.isl=[],this.sourcePointerProps={downScreenX:null,isPointering:!1,isSourceDownEventTarget:!1,swipedX:0},this.stageIndexes={},this.elements={a:[],container:null,slideSwipingHoverer:null,smw:[],sourceWrappersContainer:null,sources:[],sourceAnimationWrappers:[]},this.componentsServices={setSlideNumber:function(){}},this.resolve=function(e){var o=arguments.length>1&&arguments[1]!==void 0?arguments[1]:[];return o.unshift(t),te(e,We(o))},this.collections={sourceLoadHandlers:[],sourcesRenderFunctions:[],sourceSizers:[]},this.core={eventsDispatcher:{},globalEventsController:{},lightboxCloser:{},lightboxUpdater:{},scrollbarRecompensor:{},slideChangeFacade:{},slideIndexChanger:{},sourcesPointerDown:{},sourceDisplayFacade:{},stageManager:{},windowResizeActioner:{}},this.fs={},this.sws={},ke(this),this.close=function(){return t.core.lightboxCloser.closeLightbox()}},window.fsLightboxInstances={},oe(),window.refreshFsLightbox=function(){for(var t in fsLightboxInstances){var e=fsLightboxInstances[t].props;fsLightboxInstances[t]=new FsLightbox,fsLightboxInstances[t].props=e,fsLightboxInstances[t].props.sources=[],fsLightboxInstances[t].elements.a=[]}oe()}}])})});var ae=qe(se(),1);window.fslightbox=ae.default;window.SimpleLightBox={getViewerURL(v){switch(v.split(".").pop()){case"pdf":return`https://docs.google.com/viewer?url=${v}&embedded=true`;case"doc":case"docx":case"xls":case"xlsx":case"ppt":case"pptx":return`https://view.officeapps.live.com/op/embed.aspx?src=${v}`;default:return v}},getMultipleImgURL(v){try{if(v!=null&&v!=null){let h=v?.closest("div")?.querySelectorAll("img.simple-light-box-img-indicator");if(h!=null&&Array.from(h).length>0)return Array.from(h,g=>g.getAttribute("src"))}}catch{}return null},createIframe(v){document.getElementById("tmp-iframe")?.remove();let h=document.createElement("iframe");h.src=this.getViewerURL(v),h.id="tmp-iframe",h.className="fslightbox-source",h.frameBorder="0",h.allow="autoplay; fullscreen",h.style="width: 80vw; height: 80vh;",h.setAttribute("allowFullScreen",""),document.body.appendChild(h)},open(v,h){v.preventDefault();let g=new FsLightbox;if(h!==void 0&&h!==this.getViewerURL(h)){this.createIframe(h),g.props.sources=[document.getElementById("tmp-iframe")],g.props.onClose=function(f){document.getElementById("tmp-iframe")?.remove()},g.open();return}let m=this.getMultipleImgURL(v.target);if(m!=null&&m.length>0){g.props.sources=m,g.open();return}v.target.src!==void 0&&(g.props.sources=[v.target.src],g.open())}};
