/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************!*\
  !*** ./resources/js/api/post.js ***!
  \**********************************/
/*=========================================================================================
    File Name: post.js
    Description: Post Page
==========================================================================================*/
$(document).ready(function () {
  var page = $('#post-index-page');
  var _table = {};
  var user = {
    table: function table() {
      _table = page.find('#post-index-datatable');

      _table.DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': {
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/ajax/posts'
        },
        'columns': [{
          data: 'title',
          name: 'title'
        }, {
          data: 'published',
          name: 'published'
        }, {
          data: 'updated_at',
          name: 'updated_at'
        }, {
          data: 'action',
          name: 'action'
        }],
        "columnDefs": [{
          "searchable": true,
          "targets": 0
        }]
      });
    }
  };
  user.table();
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************!*\
  !*** ./resources/js/dashboard/mce.js ***!
  \***************************************/
tinymce.init({
  selector: '#content-text-area'
});
})();

/******/ })()
;