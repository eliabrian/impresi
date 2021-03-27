@extends('layouts.app')

@section('content')
    <div id="user-admin-index-page" class="container">
        <div class="table-responsive">
            <table id="user-admin-index-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection