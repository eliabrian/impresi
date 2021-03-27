/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/api/user.js ***!
  \**********************************/
/*=========================================================================================
    File Name: user.js
    Description: User Page
==========================================================================================*/
$(document).ready(function () {
  var page = $('#user-admin-index-page');
  var _table = {};
  var user = {
    table: function table() {
      _table = page.find('#user-admin-index-datatable');

      _table.DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': {
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/admin/ajax/users'
        },
        'columns': [{
          data: 'id',
          name: 'id'
        }, {
          data: 'name',
          name: 'name'
        }, {
          data: 'email',
          name: 'email'
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
/******/ })()
;