@extends('layouts.app')

@section('content')
<div id="post-index-page" class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto align-self-center"><strong>{{__('Posts')}}</strong></div>
                <div class=""><a href="{{ route('post.create') }}" class="btn btn-secondary">{{  __('Create A Post')}}</a></div>
              </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="post-index-datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Published')}}</th>
                            <th>{{ __('Updated At')}}</th>
                            <th>{{ __('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
