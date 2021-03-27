/*=========================================================================================
    File Name: user.js
    Description: User Page
==========================================================================================*/
$(document).ready(function () {
    let page = $('#user-admin-index-page')
    let table = {}

    let user = {
        table: () => {
            table = page.find('#user-admin-index-datatable')
            table.DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/ajax/users',
                },
                'columns': [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'}
                ],
                "columnDefs": [
                    { "searchable": true, "targets": 0 }
                  ]
            })
        } 
    }
    user.table();
});