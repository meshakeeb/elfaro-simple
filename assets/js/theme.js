/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/theme.js":
/*!*****************************!*\
  !*** ./assets/src/theme.js ***!
  \*****************************/
/***/ (() => {



/***/ }),

/***/ "./assets/scss/theme.scss":
/*!********************************!*\
  !*** ./assets/scss/theme.scss ***!
  \********************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/.pnpm/mini-css-extract-plugin@1.6.2_webpack@5.74.0/node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/.pnpm/postcss-loader@6.2.1_sat2ilddhdkv6huwh4d4inpfry/node_modules/postcss-loader/dist/cjs.js):\nError: ENOENT: no such file or directory, stat 'includes/class-assets copy.php'\n    at Object.statSync (node:fs:1596:3)\n    at resolveChangedFiles (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/tailwindcss@3.1.8_postcss@8.4.17/node_modules/tailwindcss/lib/lib/setupTrackingContext.js:117:36)\n    at resolvedChangedContent (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/tailwindcss@3.1.8_postcss@8.4.17/node_modules/tailwindcss/lib/lib/setupTrackingContext.js:101:29)\n    at /Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/tailwindcss@3.1.8_postcss@8.4.17/node_modules/tailwindcss/lib/lib/setupTrackingContext.js:163:44\n    at /Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/tailwindcss@3.1.8_postcss@8.4.17/node_modules/tailwindcss/lib/processTailwindFeatures.js:46:11\n    at plugins (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/tailwindcss@3.1.8_postcss@8.4.17/node_modules/tailwindcss/lib/index.js:33:63)\n    at LazyResult.runOnRoot (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/postcss@8.4.17/node_modules/postcss/lib/lazy-result.js:339:16)\n    at LazyResult.runAsync (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/postcss@8.4.17/node_modules/postcss/lib/lazy-result.js:393:26)\n    at LazyResult.async (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/postcss@8.4.17/node_modules/postcss/lib/lazy-result.js:221:30)\n    at LazyResult.then (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/postcss@8.4.17/node_modules/postcss/lib/lazy-result.js:206:17)\n    at processResult (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/webpack@5.74.0_webpack-cli@4.10.0/node_modules/webpack/lib/NormalModule.js:758:19)\n    at /Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/webpack@5.74.0_webpack-cli@4.10.0/node_modules/webpack/lib/NormalModule.js:860:5\n    at /Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/loader-runner@4.3.0/node_modules/loader-runner/lib/LoaderRunner.js:400:11\n    at /Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/loader-runner@4.3.0/node_modules/loader-runner/lib/LoaderRunner.js:252:18\n    at context.callback (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/loader-runner@4.3.0/node_modules/loader-runner/lib/LoaderRunner.js:124:13)\n    at Object.loader (/Users/shakeebahmed/Sites/elfaro/wp-content/themes/elfaro-simple/node_modules/.pnpm/postcss-loader@6.2.1_sat2ilddhdkv6huwh4d4inpfry/node_modules/postcss-loader/dist/index.js:142:7)");

/***/ }),

/***/ "./assets/scss/editor.scss":
/*!*********************************!*\
  !*** ./assets/scss/editor.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 			"assets/css/editor": 0
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
/******/ 	__webpack_require__.O(undefined, ["assets/css/editor"], () => (__webpack_require__("./assets/src/theme.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/editor"], () => (__webpack_require__("./assets/scss/theme.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/editor"], () => (__webpack_require__("./assets/scss/editor.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;