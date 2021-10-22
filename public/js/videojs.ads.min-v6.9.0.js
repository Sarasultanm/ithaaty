/*! @name videojs-contrib-ads @version 6.9.0 @license Apache-2.0 */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t(require("video.js"),require("global/window"),require("global/document")):"function"==typeof define&&define.amd?define(["video.js","global/window","global/document"],t):(e=e||self).videojsContribAds=t(e.videojs,e.window,e.document)}(this,function(e,t,n){"use strict";e=e&&e.hasOwnProperty("default")?e.default:e,t=t&&t.hasOwnProperty("default")?t.default:t,n=n&&n.hasOwnProperty("default")?n.default:n;var a="6.9.0";var o=function(e,t){t.isImmediatePropagationStopped=function(){return!0},t.cancelBubble=!0,t.isPropagationStopped=function(){return!0}},r=function(e,t,n){o(0,n),e.trigger({type:t+n.type,originalEvent:n})},i=function(e,t){e.ads.isInAdMode()&&(e.ads.isContentResuming()?e.ads._contentEnding&&r(e,"content",t):r(e,"ad",t))},s=function(e,t){e.ads.isInAdMode()?e.ads.isContentResuming()?(o(0,t),e.trigger("resumeended")):r(e,"ad",t):e.ads._contentHasEnded||e.ads.stitchedAds()||(r(e,"content",t),e.trigger("readyforpostroll"))},d=function(e,t){if(!("loadstart"===t.type&&!e.ads._hasThereBeenALoadStartDuringPlayerLife||"loadeddata"===t.type&&!e.ads._hasThereBeenALoadedData||"loadedmetadata"===t.type&&!e.ads._hasThereBeenALoadedMetaData))if(e.ads.inAdBreak())r(e,"ad",t);else{if(e.currentSrc()!==e.ads.contentSrc)return;r(e,"content",t)}},l=function(e,t){e.ads.inAdBreak()?r(e,"ad",t):e.ads.isContentResuming()&&r(e,"content",t)};function u(e){"playing"===e.type?i(this,e):"ended"===e.type?s(this,e):"loadstart"===e.type||"loadeddata"===e.type||"loadedmetadata"===e.type?d(this,e):"play"===e.type?l(this,e):this.ads.isInAdMode()&&(this.ads.isContentResuming()?r(this,"content",e):r(this,"ad",e))}var c={},f=function(){!function(n){if(e.dom.isInFrame()&&"function"!=typeof t.__tcfapi){for(var a,o=t,r={};o;){try{if(o.frames.__tcfapiLocator){a=o;break}}catch(e){}if(o===t.top)break;o=o.parent}if(!a)return;t.__tcfapi=function(e,t,n,o){var i=Math.random()+"",s={__tcfapiCall:{command:e,parameter:o,version:t,callId:i}};r[i]=n,a.postMessage(s,"*")},t.addEventListener("message",function(e){var t={};try{t="string"==typeof e.data?JSON.parse(e.data):e.data}catch(e){}var n=t.__tcfapiReturn;n&&"function"==typeof r[n.callId]&&(r[n.callId](n.returnValue,n.success),r[n.callId]=null)},!1)}}(),"function"==typeof t.__tcfapi&&t.__tcfapi("addEventListener",2,function(e,t){t&&(c=e)})},h=function(e,t){return t?encodeURIComponent(e):e},p=function(e,t,n){if(e&&e[n])for(var a=e[n],o=Object.keys(a),r=0;r<o.length;r++){t["{mediainfo."+n+"."+o[r]+"}"]=a[o[r]]}};var g={processMetadataTracks:function(e,t){for(var n=e.textTracks(),a=function(n){"metadata"===n.kind&&(e.ads.cueTextTracks.setMetadataTrackMode(n),t(e,n))},o=0;o<n.length;o++)a(n[o]);n.addEventListener("addtrack",function(e){a(e.track)})},setMetadataTrackMode:function(e){},getSupportedAdCue:function(e,t){return t},isSupportedAdCue:function(e,t){return!0},getCueId:function(e,t){return t.id}},y=function(e,t){return void 0!==t&&e.ads.includedCues[t]},v=function(e,t){void 0!==t&&""!==t&&(e.ads.includedCues[t]=!0)};function m(){!1!==this.ads._shouldBlockPlay&&(this.paused()||(this.ads.debug("Playback was canceled by cancelContentPlay"),this.pause()),this.ads._cancelledPlay=!0)}g.processAdTrack=function(t,n,a,o){t.ads.includedCues={};for(var r=0;r<n.length;r++){var i=n[r],s=this.getSupportedAdCue(t,i);if(!this.isSupportedAdCue(t,i))return void e.log.warn("Skipping as this is not a supported ad cue.",i);var d=this.getCueId(t,i),l=i.startTime;if(y(t,d))return void e.log("Skipping ad already seen with ID "+d);o&&o(t,s,d,l),a(t,s,d,l),v(t,d)}};var A={},S=e;A.isMiddlewareMediatorSupported=function(){return!S.browser.IS_IOS&&!S.browser.IS_ANDROID&&!!(S.use&&S.middleware&&S.middleware.TERMINATOR)},A.playMiddleware=function(t){return{setSource:function(e,t){t(null,e)},callPlay:function(){if(t.ads&&!0===t.ads._shouldBlockPlay)return t.ads.debug("Using playMiddleware to block content playback"),t.ads._playBlocked=!0,S.middleware.TERMINATOR},play:function(n,a){t.ads&&t.ads._playBlocked&&n?(t.ads.debug("Play call to Tech was terminated."),t.trigger("play"),t.addClass("vjs-has-started"),t.ads._playBlocked=!1):a&&a.catch&&a.catch(function(n){"NotAllowedError"!==n.name||e.browser.IS_SAFARI||t.trigger("pause")})}}},A.testHook=function(e){S=e};var _=A.playMiddleware,P=A.isMiddlewareMediatorSupported,b=function(){if(e.getPlugin)return Boolean(e.getPlugin("ads"));var t=e.getComponent("Player");return Boolean(t&&t.prototype.ads)};var k=function(){function e(){}return e.getState=function(t){if(t)return e.states_&&e.states_[t]?e.states_[t]:void 0},e.registerState=function(t,n){if("string"!=typeof t||!t)throw new Error('Illegal state name, "'+t+'"; must be a non-empty string.');return e.states_||(e.states_={}),e.states_[t]=n,n},e}(),C=function(){function t(e){this.player=e}t._getName=function(){return"Anonymous State"};var n=t.prototype;return n.transitionTo=function(e){var t=this.player;this.cleanup(t);var n=new e(t);t.ads._state=n,t.ads.debug(this.constructor._getName()+" -> "+n.constructor._getName());for(var a=arguments.length,o=new Array(a>1?a-1:0),r=1;r<a;r++)o[r-1]=arguments[r];n.init.apply(n,[t].concat(o))},n.init=function(){},n.cleanup=function(){},n.onPlay=function(){},n.onPlaying=function(){},n.onEnded=function(){},n.onAdEnded=function(){},n.onAdsReady=function(){e.log.warn("Unexpected adsready event")},n.onAdsError=function(){},n.onAdsCanceled=function(){},n.onAdTimeout=function(){},n.onAdStarted=function(){},n.onContentChanged=function(){},n.onContentResumed=function(){},n.onReadyForPostroll=function(){e.log.warn("Unexpected readyforpostroll event")},n.onNoPreroll=function(){},n.onNoPostroll=function(){},n.startLinearAdMode=function(){e.log.warn("Unexpected startLinearAdMode invocation (State via "+this.constructor._getName()+")")},n.endLinearAdMode=function(){e.log.warn("Unexpected endLinearAdMode invocation (State via "+this.constructor._getName()+")")},n.skipLinearAdMode=function(){e.log.warn("Unexpected skipLinearAdMode invocation (State via "+this.constructor._getName()+")")},n.isAdState=function(){throw new Error("isAdState unimplemented for "+this.constructor._getName())},n.isWaitingForAdBreak=function(){return!1},n.isContentResuming=function(){return!1},n.inAdBreak=function(){return!1},n.handleEvent=function(e){var t=this.player;"play"===e?this.onPlay(t):"adsready"===e?this.onAdsReady(t):"adserror"===e?this.onAdsError(t):"adscanceled"===e?this.onAdsCanceled(t):"adtimeout"===e?this.onAdTimeout(t):"ads-ad-started"===e?this.onAdStarted(t):"contentchanged"===e?this.onContentChanged(t):"contentresumed"===e?this.onContentResumed(t):"readyforpostroll"===e?this.onReadyForPostroll(t):"playing"===e?this.onPlaying(t):"ended"===e?this.onEnded(t):"nopreroll"===e?this.onNoPreroll(t):"nopostroll"===e?this.onNoPostroll(t):"adended"===e&&this.onAdEnded(t)},t}();function T(e,t){e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e.__proto__=t}k.registerState("State",C);var w=function(e){function t(t){var n;return(n=e.call(this,t)||this).contentResuming=!1,n.waitingForAdBreak=!1,n}T(t,e);var n=t.prototype;return n.isAdState=function(){return!0},n.onPlaying=function(){var e=k.getState("ContentPlayback");this.contentResuming&&this.transitionTo(e)},n.onContentResumed=function(){var e=k.getState("ContentPlayback");this.contentResuming&&this.transitionTo(e)},n.isWaitingForAdBreak=function(){return this.waitingForAdBreak},n.isContentResuming=function(){return this.contentResuming},n.inAdBreak=function(){return!0===this.player.ads._inLinearAdMode},t}(C);k.registerState("AdState",w);var R=function(e){function t(){return e.apply(this,arguments)||this}T(t,e);var n=t.prototype;return n.isAdState=function(){return!1},n.onContentChanged=function(e){var t=k.getState("BeforePreroll"),n=k.getState("Preroll");e.ads.debug("Received contentchanged event (ContentState)"),e.paused()?this.transitionTo(t):(this.transitionTo(n,!1),e.pause(),e.ads._pausedOnContentupdate=!0)},t}(C);k.registerState("ContentState",R);var L,B=function(t){function n(){return t.apply(this,arguments)||this}T(n,t),n._getName=function(){return"AdsDone"};var a=n.prototype;return a.init=function(e){e.ads._contentHasEnded=!0,e.trigger("ended")},a.startLinearAdMode=function(){e.log.warn("Unexpected startLinearAdMode invocation (AdsDone)")},n}(k.getState("ContentState"));k.registerState("AdsDone",B);var M={start:function(t){t.ads.debug("Starting ad break"),t.ads._inLinearAdMode=!0,t.trigger("adstart"),t.ads.shouldTakeSnapshots()&&(t.ads.snapshot=function(t){var n;n=e.browser.IS_IOS&&t.ads.isLive(t)&&t.seekable().length>0?t.currentTime()-t.seekable().end(0):t.currentTime();var a=t.$(".vjs-tech"),o=t.textTracks?t.textTracks():[],r=[],i={ended:t.ended(),currentSrc:t.currentSrc(),sources:t.currentSources(),src:t.tech_.src(),currentTime:n,type:t.currentType()};a&&(i.style=a.getAttribute("style"));for(var s=0;s<o.length;s++){var d=o[s];r.push({track:d,mode:d.mode}),d.mode="disabled"}return i.suppressedTracks=r,i}(t)),t.ads.shouldPlayContentBehindAd(t)&&(t.ads.preAdVolume_=t.volume(),t.volume(0)),t.addClass("vjs-ad-playing"),t.hasClass("vjs-live")&&t.removeClass("vjs-live"),t.ads.removeNativePoster()},end:function(t,n){t.ads.debug("Ending ad break"),void 0===n&&(n=function(){}),t.ads.adType=null,t.ads._inLinearAdMode=!1,t.trigger("adend"),t.removeClass("vjs-ad-playing"),t.ads.isLive(t)&&t.addClass("vjs-live"),t.ads.shouldTakeSnapshots()?function(t,n){var a=t.ads.snapshot;if(void 0===n&&(n=function(){}),!0===t.ads.disableNextSnapshotRestore)return t.ads.disableNextSnapshotRestore=!1,delete t.ads.snapshot,void n();var o,r=t.$(".vjs-tech"),i=20,s=a.suppressedTracks,d=function(){for(var e=0;e<s.length;e++)(o=s[e]).track.mode=o.mode},l=function(){var n;if(e.browser.IS_IOS&&t.ads.isLive(t)){if(a.currentTime<0&&(n=t.seekable().length>0?t.seekable().end(0)+a.currentTime:t.currentTime(),t.currentTime(n)),t.paused()){var o=t.play();o&&o.catch&&o.catch(function(t){e.log.warn("Play promise rejected in IOS snapshot resume",t)})}}else if(a.ended)t.currentTime(t.duration());else{t.currentTime(a.currentTime);var r=t.play();r&&r.catch&&r.catch(function(t){e.log.warn("Play promise rejected in snapshot resume",t)})}t.ads.shouldRemoveAutoplay_&&(t.autoplay(!1),t.ads.shouldRemoveAutoplay_=!1)},u=function n(){if(t.off("contentcanplay",n),L&&t.clearTimeout(L),(r=t.el().querySelector(".vjs-tech")).readyState>1)return l();if(void 0===r.seekable)return l();if(r.seekable.length>0)return l();if(i--)t.setTimeout(n,50);else try{l()}catch(t){e.log.warn("Failed to resume the content after an advertisement",t)}};if("style"in a&&r.setAttribute("style",a.style||""),t.ads.videoElementRecycled())t.one("resumeended",function(){delete t.ads.snapshot,n()}),t.one("contentloadedmetadata",d),e.browser.IS_IOS&&!t.autoplay()&&(t.autoplay(!0),t.ads.shouldRemoveAutoplay_=!0),t.src(a.sources),t.one("contentcanplay",u),L=t.setTimeout(u,2e3);else{if(d(),!t.ended()){var c=t.play();c&&c.catch&&c.catch(function(t){e.log.warn("Play promise rejected in snapshot restore",t)})}delete t.ads.snapshot,n()}}(t,n):(t.volume(t.ads.preAdVolume_),n())}},j=function(t){function n(){return t.apply(this,arguments)||this}T(n,t),n._getName=function(){return"Preroll"};var a=n.prototype;return a.init=function(e,t,n){if(this.waitingForAdBreak=!0,e.addClass("vjs-ad-loading"),n||e.ads.nopreroll_)return this.resumeAfterNoPreroll(e);var a=e.ads.settings.timeout;"number"==typeof e.ads.settings.prerollTimeout&&(a=e.ads.settings.prerollTimeout),this._timeout=e.setTimeout(function(){e.trigger("adtimeout")},a),t?this.handleAdsReady():this.adsReady=!1},a.onAdsReady=function(t){t.ads.inAdBreak()?e.log.warn("Unexpected adsready event (Preroll)"):(t.ads.debug("Received adsready event (Preroll)"),this.handleAdsReady())},a.handleAdsReady=function(){this.adsReady=!0,this.readyForPreroll()},a.afterLoadStart=function(e){var t=this.player;t.ads._hasThereBeenALoadStartDuringPlayerLife?e():(t.ads.debug("Waiting for loadstart..."),t.one("loadstart",function(){t.ads.debug("Received loadstart event"),e()}))},a.noPreroll=function(){var e=this;this.afterLoadStart(function(){e.player.ads.debug("Skipping prerolls due to nopreroll event (Preroll)"),e.resumeAfterNoPreroll(e.player)})},a.readyForPreroll=function(){var e=this.player;this.afterLoadStart(function(){e.ads.debug("Triggered readyforpreroll event (Preroll)"),e.trigger("readyforpreroll")})},a.onAdsCanceled=function(e){var t=this;e.ads.debug("adscanceled (Preroll)"),this.afterLoadStart(function(){t.resumeAfterNoPreroll(e)})},a.onAdsError=function(t){var n=this;e.log("adserror (Preroll)"),this.inAdBreak()?t.ads.endLinearAdMode():this.afterLoadStart(function(){n.resumeAfterNoPreroll(t)})},a.startLinearAdMode=function(){var t=this.player;!this.adsReady||t.ads.inAdBreak()||this.isContentResuming()?e.log.warn("Unexpected startLinearAdMode invocation (Preroll)"):(this.clearTimeout(t),t.ads.adType="preroll",this.waitingForAdBreak=!1,M.start(t),t.ads._shouldBlockPlay=!1)},a.onAdStarted=function(e){e.removeClass("vjs-ad-loading")},a.endLinearAdMode=function(){var e=this.player;this.inAdBreak()&&(e.removeClass("vjs-ad-loading"),e.addClass("vjs-ad-content-resuming"),this.contentResuming=!0,M.end(e))},a.skipLinearAdMode=function(){var t=this,n=this.player;n.ads.inAdBreak()||this.isContentResuming()?e.log.warn("Unexpected skipLinearAdMode invocation"):this.afterLoadStart(function(){n.trigger("adskip"),n.ads.debug("skipLinearAdMode (Preroll)"),t.resumeAfterNoPreroll(n)})},a.onAdTimeout=function(e){var t=this;this.afterLoadStart(function(){e.ads.debug("adtimeout (Preroll)"),t.resumeAfterNoPreroll(e)})},a.onNoPreroll=function(t){t.ads.inAdBreak()||this.isContentResuming()?e.log.warn("Unexpected nopreroll event (Preroll)"):this.noPreroll()},a.resumeAfterNoPreroll=function(e){if(this.contentResuming=!0,e.ads._shouldBlockPlay=!1,this.cleanupPartial(e),e.ads._playRequested||e.ads._pausedOnContentupdate)if(e.paused()){e.ads.debug("resumeAfterNoPreroll: attempting to resume playback (Preroll)");var t=e.play();t&&t.then&&t.then(null,function(e){})}else e.ads.debug("resumeAfterNoPreroll: already playing (Preroll)"),e.trigger("play"),e.trigger("playing")},a.cleanup=function(t){t.ads._hasThereBeenALoadStartDuringPlayerLife||e.log.warn("Leaving Preroll state before loadstart event can cause issues."),this.cleanupPartial(t)},a.cleanupPartial=function(e){e.removeClass("vjs-ad-loading"),e.removeClass("vjs-ad-content-resuming"),this.clearTimeout(e)},a.clearTimeout=function(e){e.clearTimeout(this._timeout),this._timeout=null},n}(k.getState("AdState"));k.registerState("Preroll",j);var I=function(e){function t(){return e.apply(this,arguments)||this}T(t,e),t._getName=function(){return"BeforePreroll"};var n=t.prototype;return n.init=function(e){this.adsReady=!1,this.shouldResumeToContent=!1,e.ads._shouldBlockPlay=!e.ads.settings.allowVjsAutoplay||!e.autoplay()},n.onAdsReady=function(e){e.ads.debug("Received adsready event (BeforePreroll)"),this.adsReady=!0},n.onPlay=function(e){var t=k.getState("Preroll");e.ads.debug("Received play event (BeforePreroll)"),this.transitionTo(t,this.adsReady,this.shouldResumeToContent)},n.onAdsCanceled=function(e){e.ads.debug("adscanceled (BeforePreroll)"),this.shouldResumeToContent=!0},n.onAdsError=function(){this.player.ads.debug("adserror (BeforePreroll)"),this.shouldResumeToContent=!0},n.onNoPreroll=function(){this.player.ads.debug("Skipping prerolls due to nopreroll event (BeforePreroll)"),this.shouldResumeToContent=!0},n.skipLinearAdMode=function(){var e=this.player;e.trigger("adskip"),e.ads.debug("skipLinearAdMode (BeforePreroll)"),this.shouldResumeToContent=!0},n.onContentChanged=function(){this.init(this.player)},t}(k.getState("ContentState"));k.registerState("BeforePreroll",I);var N=function(e){function t(){return e.apply(this,arguments)||this}T(t,e),t._getName=function(){return"Midroll"};var n=t.prototype;return n.init=function(e){e.ads.adType="midroll",M.start(e),e.addClass("vjs-ad-loading")},n.onAdStarted=function(e){e.removeClass("vjs-ad-loading")},n.endLinearAdMode=function(){var e=this.player;this.inAdBreak()&&(this.contentResuming=!0,e.addClass("vjs-ad-content-resuming"),e.removeClass("vjs-ad-loading"),M.end(e))},n.onAdsError=function(e){this.inAdBreak()&&e.ads.endLinearAdMode()},n.cleanup=function(e){e.removeClass("vjs-ad-loading"),e.removeClass("vjs-ad-content-resuming")},t}(k.getState("AdState"));k.registerState("Midroll",N);var E=function(t){function n(){return t.apply(this,arguments)||this}T(n,t),n._getName=function(){return"Postroll"};var a=n.prototype;return a.init=function(e){if(this.waitingForAdBreak=!0,e.ads._contentEnding=!0,e.ads.nopostroll_){this.resumeContent(e);var t=k.getState("AdsDone");this.transitionTo(t)}else{e.addClass("vjs-ad-loading");var n=e.ads.settings.timeout;"number"==typeof e.ads.settings.postrollTimeout&&(n=e.ads.settings.postrollTimeout),this._postrollTimeout=e.setTimeout(function(){e.trigger("adtimeout")},n)}},a.startLinearAdMode=function(){var t=this.player;t.ads.inAdBreak()||this.isContentResuming()?e.log.warn("Unexpected startLinearAdMode invocation (Postroll)"):(t.ads.adType="postroll",t.clearTimeout(this._postrollTimeout),this.waitingForAdBreak=!1,M.start(t))},a.onAdStarted=function(e){e.removeClass("vjs-ad-loading")},a.endLinearAdMode=function(){var e=this,t=this.player,n=k.getState("AdsDone");this.inAdBreak()&&(t.removeClass("vjs-ad-loading"),this.resumeContent(t),M.end(t,function(){e.transitionTo(n)}))},a.skipLinearAdMode=function(){var t=this.player;t.ads.inAdBreak()||this.isContentResuming()?e.log.warn("Unexpected skipLinearAdMode invocation"):(t.ads.debug("Postroll abort (skipLinearAdMode)"),t.trigger("adskip"),this.abort(t))},a.onAdTimeout=function(e){e.ads.debug("Postroll abort (adtimeout)"),this.abort(e)},a.onAdsError=function(e){e.ads.debug("Postroll abort (adserror)"),e.ads.inAdBreak()?e.ads.endLinearAdMode():this.abort(e)},a.onContentChanged=function(e){if(this.isContentResuming()){var t=k.getState("BeforePreroll");this.transitionTo(t)}else if(!this.inAdBreak()){var n=k.getState("Preroll");this.transitionTo(n)}},a.onNoPostroll=function(t){this.isContentResuming()||this.inAdBreak()?e.log.warn("Unexpected nopostroll event (Postroll)"):this.abort(t)},a.resumeContent=function(e){this.contentResuming=!0,e.addClass("vjs-ad-content-resuming")},a.abort=function(e){var t=k.getState("AdsDone");this.resumeContent(e),e.removeClass("vjs-ad-loading"),this.transitionTo(t)},a.cleanup=function(e){e.removeClass("vjs-ad-content-resuming"),e.clearTimeout(this._postrollTimeout),e.ads._contentEnding=!1},n}(k.getState("AdState"));k.registerState("Postroll",E);var x=function(e){function t(){return e.apply(this,arguments)||this}T(t,e),t._getName=function(){return"ContentPlayback"};var n=t.prototype;return n.init=function(e){e.ads._shouldBlockPlay=!1},n.onAdsReady=function(e){e.ads.debug("Received adsready event (ContentPlayback)"),e.ads.nopreroll_||(e.ads.debug("Triggered readyforpreroll event (ContentPlayback)"),e.trigger("readyforpreroll"))},n.onReadyForPostroll=function(e){var t=k.getState("Postroll");e.ads.debug("Received readyforpostroll event"),this.transitionTo(t)},n.startLinearAdMode=function(){var e=k.getState("Midroll");this.transitionTo(e)},t}(k.getState("ContentState"));k.registerState("ContentPlayback",x);var D=function(e){function t(){return e.apply(this,arguments)||this}T(t,e),t._getName=function(){return"StitchedContentPlayback"};var n=t.prototype;return n.init=function(){this.player.ads._shouldBlockPlay=!1},n.onContentChanged=function(){this.player.ads.debug("Received contentchanged event ("+this.constructor._getName()+")")},n.startLinearAdMode=function(){var e=k.getState("StitchedAdRoll");this.transitionTo(e)},t}(k.getState("ContentState"));k.registerState("StitchedContentPlayback",D);var O=function(e){function t(){return e.apply(this,arguments)||this}T(t,e),t._getName=function(){return"StitchedAdRoll"};var n=t.prototype;return n.init=function(){this.waitingForAdBreak=!1,this.contentResuming=!1,this.player.ads.adType="stitched",M.start(this.player)},n.onPlaying=function(){},n.onContentResumed=function(){},n.onAdEnded=function(){this.endLinearAdMode(),this.player.trigger("ended")},n.endLinearAdMode=function(){var e=k.getState("StitchedContentPlayback");M.end(this.player),this.transitionTo(e)},t}(k.getState("AdState"));k.registerState("StitchedAdRoll",O);var F=A.isMiddlewareMediatorSupported,U=e.getTech("Html5").Events,V={timeout:5e3,prerollTimeout:void 0,postrollTimeout:void 0,debug:!1,stitchedAds:!1,contentIsLive:void 0,liveCuePoints:!0,allowVjsAutoplay:e.options.normalizeAutoplay||!1},q=function(o){var r=this,i=e.mergeOptions(V,o),s=[];U.concat(["firstplay","loadedalldata"]).forEach(function(e){-1===s.indexOf(e)&&s.push(e)}),r.on(s,u),F()||function(t,n){n&&e.log("Using cancelContentPlay to block content playback"),t.on("play",m)}(r,i.debug),r.setTimeout(function(){r.ads._hasThereBeenALoadStartDuringPlayerLife||""===r.src()||e.log.error("videojs-contrib-ads has not seen a loadstart event 5 seconds after being initialized, but a source is present. This indicates that videojs-contrib-ads was initialized too late. It must be initialized immediately after video.js in the same tick. As a result, some ads will not play and some media events will be incorrect. For more information, see http://videojs.github.io/videojs-contrib-ads/integrator/getting-started.html")},5e3),r.on("ended",function(){r.hasClass("vjs-has-started")||r.addClass("vjs-has-started")}),r.on("contenttimeupdate",function(){r.removeClass("vjs-waiting")}),r.on(["addurationchange","adcanplay"],function(){if(!r.ads.settings.stitchedAds&&!r.hasStarted()&&(!r.ads.snapshot||r.currentSrc()!==r.ads.snapshot.currentSrc)&&r.ads.inAdBreak()){var t=r.play();t&&t.catch&&t.catch(function(t){e.log.warn("Play promise rejected when playing ad",t)})}}),r.on("nopreroll",function(){r.ads.debug("Received nopreroll event"),r.ads.nopreroll_=!0}),r.on("nopostroll",function(){r.ads.debug("Received nopostroll event"),r.ads.nopostroll_=!0}),r.on("playing",function(){r.ads._cancelledPlay=!1,r.ads._pausedOnContentupdate=!1}),r.on("play",function(){r.ads._playRequested=!0}),r.one("loadstart",function(){r.ads._hasThereBeenALoadStartDuringPlayerLife=!0}),r.on("loadeddata",function(){r.ads._hasThereBeenALoadedData=!0}),r.on("loadedmetadata",function(){r.ads._hasThereBeenALoadedMetaData=!0}),r.ads=function(t){return{disableNextSnapshotRestore:!1,_contentEnding:!1,_contentHasEnded:!1,_hasThereBeenALoadStartDuringPlayerLife:!1,_hasThereBeenALoadedData:!1,_hasThereBeenALoadedMetaData:!1,_inLinearAdMode:!1,_shouldBlockPlay:!1,_playBlocked:!1,_playRequested:!1,adType:null,VERSION:a,reset:function(){t.ads.disableNextSnapshotRestore=!1,t.ads._contentEnding=!1,t.ads._contentHasEnded=!1,t.ads.snapshot=null,t.ads.adType=null,t.ads._hasThereBeenALoadedData=!1,t.ads._hasThereBeenALoadedMetaData=!1,t.ads._cancelledPlay=!1,t.ads._shouldBlockPlay=!1,t.ads._playBlocked=!1,t.ads.nopreroll_=!1,t.ads.nopostroll_=!1,t.ads._playRequested=!1},startLinearAdMode:function(){t.ads._state.startLinearAdMode()},endLinearAdMode:function(){t.ads._state.endLinearAdMode()},skipLinearAdMode:function(){t.ads._state.skipLinearAdMode()},stitchedAds:function(t){return void 0!==t&&(e.log.warn("Using player.ads.stitchedAds() as a setter is deprecated, it should be set as an option upon initialization of contrib-ads."),this.settings.stitchedAds=!!t),this.settings.stitchedAds},videoElementRecycled:function(){if(t.ads.shouldPlayContentBehindAd(t))return!1;if(!this.snapshot)throw new Error("You cannot use videoElementRecycled while there is no snapshot.");var e=t.tech_.src()!==this.snapshot.src,n=t.currentSrc()!==this.snapshot.currentSrc;return e||n},isLive:function(n){return void 0===n&&(n=t),"boolean"==typeof n.ads.settings.contentIsLive?n.ads.settings.contentIsLive:n.duration()===1/0||"8"===e.browser.IOS_VERSION&&0===n.duration()},shouldPlayContentBehindAd:function(n){if(void 0===n&&(n=t),n)return!!n.ads.settings.liveCuePoints&&!e.browser.IS_IOS&&!e.browser.IS_ANDROID&&n.duration()===1/0;throw new Error("shouldPlayContentBehindAd requires a player as a param")},shouldTakeSnapshots:function(e){return void 0===e&&(e=t),!this.shouldPlayContentBehindAd(e)&&!this.stitchedAds()},isInAdMode:function(){return this._state.isAdState()},isWaitingForAdBreak:function(){return this._state.isWaitingForAdBreak()},isContentResuming:function(){return this._state.isContentResuming()},isAdPlaying:function(){return this._state.inAdBreak()},inAdBreak:function(){return this._state.inAdBreak()},removeNativePoster:function(){var e=t.$(".vjs-tech");e&&e.removeAttribute("poster")},debug:function(){if(this.settings.debug){for(var t=arguments.length,n=new Array(t),a=0;a<t;a++)n[a]=arguments[a];1===n.length&&"string"==typeof n[0]?e.log("ADS: "+n[0]):e.log.apply(e,["ADS:"].concat(n))}}}}(r),r.ads.settings=i,i.stitchedAds=!!i.stitchedAds,i.stitchedAds?r.ads._state=new(k.getState("StitchedContentPlayback"))(r):r.ads._state=new(k.getState("BeforePreroll"))(r),r.ads._state.init(r),r.ads.cueTextTracks=g,r.ads.adMacroReplacement=function(a,o,r){var i=this,s={};a=a.replace(/{([^}=]+)=([^}]+)}/g,function(e,t,n){return s["{"+t+"}"]=n,"{"+t+"}"}),void 0===o&&(o=!1);var d={};for(var l in void 0!==r&&(d=r),d["{player.id}"]=this.options_["data-player"]||this.id_,d["{player.height}"]=this.currentHeight(),d["{player.width}"]=this.currentWidth(),d["{mediainfo.id}"]=this.mediainfo?this.mediainfo.id:"",d["{mediainfo.name}"]=this.mediainfo?this.mediainfo.name:"",d["{mediainfo.duration}"]=this.mediainfo?this.mediainfo.duration:"",d["{player.duration}"]=this.duration(),d["{player.pageUrl}"]=e.dom.isInFrame()?n.referrer:t.location.href,d["{playlistinfo.id}"]=this.playlistinfo?this.playlistinfo.id:"",d["{playlistinfo.name}"]=this.playlistinfo?this.playlistinfo.name:"",d["{timestamp}"]=(new Date).getTime(),d["{document.referrer}"]=n.referrer,d["{window.location.href}"]=t.location.href,d["{random}"]=Math.floor(1e12*Math.random()),["description","tags","reference_id","ad_keys"].forEach(function(e){i.mediainfo&&i.mediainfo[e]?d["{mediainfo."+e+"}"]=i.mediainfo[e]:s["{mediainfo."+e+"}"]?d["{mediainfo."+e+"}"]=s["{mediainfo."+e+"}"]:d["{mediainfo."+e+"}"]=""}),p(this.mediainfo,d,"custom_fields"),p(this.mediainfo,d,"customFields"),Object.keys(c).forEach(function(e){d["{tcf."+e+"}"]=c[e]}),d["{tcf.gdprAppliesInt}"]=c.gdprApplies?1:0,d)a=a.split(l).join(h(d[l],o));for(var u in a=a.replace(/{pageVariable\.([^}]+)}/g,function(n,a){for(var r,i=t,d=a.split("."),l=0;l<d.length;l++)l===d.length-1?r=i[d[l]]:i=i[d[l]];var u=typeof r;return null===r?"null":void 0===r?s["{pageVariable."+a+"}"]?s["{pageVariable."+a+"}"]:(e.log.warn('Page variable "'+a+'" not found'),""):"string"!==u&&"number"!==u&&"boolean"!==u?(e.log.warn('Page variable "'+a+'" is not a supported type'),""):h(String(r),o)}),s)a=a.replace(u,s[u]);return a}.bind(r),function(e){e.ads.contentSrc=e.currentSrc(),e.ads._seenInitialLoadstart=!1,e.on("loadstart",function(){if(!e.ads.inAdBreak()){var t=e.currentSrc();t!==e.ads.contentSrc&&(e.ads._seenInitialLoadstart&&e.trigger({type:"contentchanged"}),e.trigger({type:"contentupdate",oldValue:e.ads.contentSrc,newValue:t}),e.ads.contentSrc=t),e.ads._seenInitialLoadstart=!0}})}(r),r.on("contentchanged",r.ads.reset);var d=function(){var t=r.textTracks();if(!r.ads.shouldPlayContentBehindAd(r)&&r.ads.inAdBreak()&&r.tech_.featuresNativeTextTracks&&e.browser.IS_IOS&&!Array.isArray(r.textTracks()))for(var n=0;n<t.length;n++){var a=t[n];"showing"===a.mode&&(a.mode="disabled")}};r.ready(function(){r.textTracks().addEventListener("change",d)}),r.on(["play","playing","ended","adsready","adscanceled","adskip","adserror","adtimeout","adended","ads-ad-started","contentchanged","dispose","contentresumed","readyforpostroll","nopreroll","nopostroll"],function(e){r.ads._state.handleEvent(e.type)}),r.on("dispose",function(){r.ads.reset(),r.textTracks().removeEventListener("change",d)}),f(),r.ads.listenToTcf=f};return q.VERSION=a,function(t){!b(e)&&((e.registerPlugin||e.plugin)("ads",t),P()&&!e.usingContribAdsMiddleware_&&(e.use("*",_),e.usingContribAdsMiddleware_=!0,e.log.debug("Play middleware has been registered with videojs")))}(q),q});
