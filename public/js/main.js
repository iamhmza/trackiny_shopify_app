/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var quests = [{
  id: 1,
  question: 'can i try for free',
  answer: 'Sure, you can! When you install Trackiny, you will have a 14 days free trial where you can test the capabilities/functions of the app. If for any reason you think that the app is not for you, you can simply uninstall it from your store during your trial and you will never be charged.',
  open: false
}, {
  id: 2,
  question: 'Can i use Trackiny with other ecommerce platforms',
  answer: 'yes of course you could',
  open: true
}, {
  id: 3,
  question: 'Why trackiny and not submitting the info manualy',
  answer: 'yes of course you could',
  open: false
}, {
  id: 4,
  question: 'can i connect multiple stores with the same subscription',
  answer: 'yes of course you could',
  open: false
}, {
  id: 5,
  question: 'is trackiny safe to use ?',
  answer: 'yes of course you could',
  open: false
}, {
  id: 6,
  question: 'I have another question',
  answer: 'yes of course you could',
  open: false
}];
var elQuests = Array.from(document.querySelectorAll('.accordion-item'));
elQuests.forEach(function (el) {
  el.addEventListener('click', function (e) {
    // reset
    elQuests.filter(function (elm) {
      return elm.dataset.index != el.dataset.index;
    }).forEach(function (elm) {
      return elm.dataset.state = 'hidden';
    }); // toglle hidden and show

    el.dataset.state = el.dataset.state == 'show' ? 'hidden' : 'show';
  });
});
/* Modal */

var elCloseBtn = document.querySelector('#close'),
    elOpenBtn = document.querySelector('#open'),
    elModal = document.querySelector('#modal');
elCloseBtn.addEventListener('click', function () {
  elModal.dataset.state = 'closed';
});
elOpenBtn.addEventListener('click', function () {
  elModal.dataset.state = 'opened';
});
/* Sliding testimonials */

new Glider(document.querySelector('.glider'), {
  slidesToShow: 1,
  //'auto',
  slidesToScroll: 1,
  itemWidth: 150,
  draggable: true,
  scrollLock: false,
  dots: '.dots',
  // rewind: true,
  responsive: [{
    // screens greater than >= 775px
    breakpoint: 768,
    settings: {
      // Set to `auto` and provide item width to adjust to viewport
      slidesToShow: 2,
      slidesToScroll: 1.5,
      itemWidth: 150,
      duration: 0.25
    }
  }, {
    // screens greater than >= 1024px
    breakpoint: 1024,
    settings: {
      slidesToShow: 2.5,
      slidesToScroll: 1.5,
      itemWidth: 150,
      duration: 0.25
    }
  }]
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\anotherapp\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });