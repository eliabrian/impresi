/*=========================================================================================
    File Name: post.js
    Description: Post Page
==========================================================================================*/
$(document).ready(function () {
    let page = $('#post-index-page')
    let table = {}

    let user = {
        table: () => {
            table = page.find('#post-index-datatable')
            table.DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/ajax/posts',
                },
                'columns': [
                    {data: 'title', name: 'title'},
                    {data: 'published', name: 'published'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action' }
                ],
                "columnDefs": [
                    { "searchable": true, "targets": 0 }
                  ]
            })
        } 
    }
    user.table();
});