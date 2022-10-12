/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/player.js":
/*!******************************!*\
  !*** ./assets/src/player.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function formatTime(secs) {
  var minutes = Math.floor(secs / 60),
    seconds = Math.floor(secs % 60),
    returnedMinutes = minutes < 10 ? "0".concat(minutes) : "".concat(minutes),
    returnedSeconds = seconds < 10 ? "0".concat(seconds) : "".concat(seconds);
  return "".concat(returnedMinutes, ":").concat(returnedSeconds);
}
var Player = /*#__PURE__*/function () {
  function Player() {
    _classCallCheck(this, Player);
    _defineProperty(this, "item", {
      audio: false,
      title: false,
      image: false,
      permalink: false,
      button: false
    });
    _defineProperty(this, "show", false);
    _defineProperty(this, "play", false);
    _defineProperty(this, "loading", false);
    _defineProperty(this, "duration", 0);
    _defineProperty(this, "currentTime", 0);
    _defineProperty(this, "buffered", 0);
    _defineProperty(this, "playbackRate", 1);
    this.player = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.js-player');
    this.audio = this.player.find('.item-audio');
    this.progressbar = this.player.find('#progressbar');

    // Item
    this.itemImage = this.player.find('.item-image');
    this.itemTitle = this.player.find('.item-title');
    this.itemPermalink = this.player.find('.item-permalink');
    this.events();
  }
  _createClass(Player, [{
    key: "events",
    value: function events() {
      var _this = this;
      this.audio.on('timeupdate', function () {
        _this.currentTime = _this.audio.currentTime;
      }).on('durationchange', function () {
        _this.duration = Math.floor(_this.audio.duration);

        // progressbar.addEventListener('input', () => {
        // 	this.audio.currentTime = this.currentTime
        // })
      }).on('progress', function () {
        if (_this.audio.buffered && _this.audio.buffered.length > 0) {
          _this.buffered = _this.audio.buffered.end(_this.audio.buffered.length - 1);
        }
      }).on('loadeddata', function () {
        _this.audio.paused && _this.audio.play();
        _this.loading = false;
      }).on('play', function () {
        _this.play = true;
      }).on('pause', function () {
        _this.play = false;
      });
    }
  }, {
    key: "setItem",
    value: function setItem(item) {
      this.item = item;
      this.itemImage.hide();
      this.itemTitle.hide();
      this.itemPermalink.hide();
      if (this.item.image) {
        this.itemImage.attr('src', this.item.image);
        this.itemImage.show();
      }
      if (this.item.title) {
        this.itemTitle.html(this.item.title);
        this.itemTitle.show();
      }
      if (this.item.permalink) {
        this.itemPermalink.attr('href', this.item.permalink);
        this.itemPermalink.show();
      }
      if (this.item.audio) {
        this.audio.attr('src', this.item.audio);
      }
      this.showPlayer();
      this.audio.get(0).play();
    }
  }, {
    key: "showPlayer",
    value: function showPlayer() {
      this.player.removeClass('translate-y-full');
    }
  }, {
    key: "hidePlayer",
    value: function hidePlayer() {
      this.player.addClass('translate-y-full');
    }
  }]);
  return Player;
}();
/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {
  var toggleButton = function toggleButton(button) {
    button.toggleClass('active');
    button.find('.toggle-play').each(function () {
      var target = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this);
      target.toggle();
    });
  };
  var player = new Player();
  jquery__WEBPACK_IMPORTED_MODULE_0___default()('.js-play-audio').on('click', function () {
    var button = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this);
    var article = button.closest('article');
    var active = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.js-play-audio.active');
    if (active.length > 0 && !button.is(active)) {
      toggleButton(active);
    }
    toggleButton(button);
    player.setItem({
      audio: button.data('audio'),
      title: article.find('h2').text(),
      image: article.find('img').attr('src'),
      permalink: article.find('a').attr('href'),
      button: button
    });
  });

  // player: {
  // [':style']() {
  // return {
  // 	'--progress-width': `${(this.currentTime / this.duration) * 100}%`,
  // 	'--buffered-width': `${(this.buffered / this.duration) * 100}%`,
  // }
  // },

  // ['@play-audio.window']() {
  // return this.$event.detail.audio && !this.loading
  // 	? (this.$event.detail.audio == this.item.audio
  // 		? this.togglePlay()
  // 		: this.item = (({ audio, title, image, permalink }) => ({ audio, title, image, permalink }))(this.$event.detail)
  // 	)
  // 	: false
  // },
  // },

  // togglePlay() { this.play = !this.play },

  // togglePlaybackRate() {
  // if (audio && audio.playbackRate) {
  // audio.playbackRate == 2
  // 	? audio.playbackRate = 1
  // 	: audio.playbackRate = audio.playbackRate + 0.5
  // this.playbackRate = audio.playbackRate
  // }
  // },
}

/***/ }),

/***/ "./assets/src/theme.js":
/*!*****************************!*\
  !*** ./assets/src/theme.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _player__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./player */ "./assets/src/player.js");


jquery__WEBPACK_IMPORTED_MODULE_0___default()(function () {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()('.js-toggle-speed').on('click', function () {
    var speed = docCookies.getItem('bandwidthSpeed');
    speed = speed || 'high';
    var newValue = 'high' === speed ? 'low' : 'high';
    docCookies.setItem('bandwidthSpeed', newValue);
    window.location.reload();
  });
  jquery__WEBPACK_IMPORTED_MODULE_0___default()('.js-hide-speed').on('click', function () {
    docCookies.setItem('hideBandwidthBanner', 1);
    document.getElementById('bandwidth-bar').style.display = 'none';
  });
  jquery__WEBPACK_IMPORTED_MODULE_0___default()('.js-toggle').on('click', function () {
    var button = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this);
    var tagerts = jquery__WEBPACK_IMPORTED_MODULE_0___default()(button.data('target'));
    tagerts.each(function () {
      var target = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this);
      target.toggle();
    });
  });
  (0,_player__WEBPACK_IMPORTED_MODULE_1__["default"])();
});

/***/ }),

/***/ "./assets/scss/theme.scss":
/*!********************************!*\
  !*** ./assets/scss/theme.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/theme": 0,
/******/ 			"assets/css/theme": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkelfaro"] = self["webpackChunkelfaro"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/theme"], () => (__webpack_require__("./assets/src/theme.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/theme"], () => (__webpack_require__("./assets/scss/theme.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;