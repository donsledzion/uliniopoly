/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/create-board.js ***!
  \**************************************/
$(function () {
  $('.add-board').click(function () {
    console.log('clicked!');
    var form = $('.board-form').serialize();
    console.log('serialized form is: ' + decodeURI(form));
    $.ajax({
      method: 'post',
      url: '/boards',
      data: form
    });
  });
});
/******/ })()
;