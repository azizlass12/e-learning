/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/apps/js/admin/api.js":
/*!*****************************************!*\
  !*** ./assets/src/apps/js/admin/api.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * List API on backend
 */
/* harmony default export */ __webpack_exports__["default"] = ({
  apiAdminNotice: lpGlobalSettings.rest + 'lp/v1/admin/tools/admin-notices',
  apiAdminOrderStatic: lpGlobalSettings.rest + 'lp/v1/orders/statistic',
  apiAddons: lpGlobalSettings.rest + 'lp/v1/addon/all',
  apiAddonAction: lpGlobalSettings.rest + 'lp/v1/addon/action'
});

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
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!*****************************************************!*\
  !*** ./assets/src/apps/js/admin/pages/dashboard.js ***!
  \*****************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../api */ "./assets/src/apps/js/admin/api.js");
/**
 * Scripts run on the Dashboard of WordPress
 *
 * @since 3.0.0
 * @version 1.0.1
 */


let dataOrderStatic = null;
let elOrderStatic = null;
const callAPIOrderStatic = () => {
  if (!lpGlobalSettings.is_admin) {
    return;
  }
  fetch(_api__WEBPACK_IMPORTED_MODULE_0__["default"].apiAdminOrderStatic, {
    method: 'GET'
  }).then(res => {
    return res.json();
  }).then(res => {
    dataOrderStatic = res;
  }).catch(err => {
    console.log(err);
  });
};
callAPIOrderStatic();
const interval = setInterval(() => {
  elOrderStatic = document.querySelector('ul.lp-order-statuses');
  if (elOrderStatic && dataOrderStatic !== null) {
    if (dataOrderStatic.status === 'success' && dataOrderStatic.data) {
      elOrderStatic.innerHTML = dataOrderStatic.data;
    } else {
      elOrderStatic.innerHTML = `<div class="error">${dataOrderStatic.message}</div>`;
    }
    clearInterval(interval);
  }
}, 1);
}();
/******/ })()
;
//# sourceMappingURL=dashboard.js.map