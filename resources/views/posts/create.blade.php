@extends('layouts.app')

@section('content')
<div id="post-index-page" class="container">
    <div class="card">
        <div class="card-header">
            <div class="mr-auto align-self-center"><strong>{{__('Create A Post')}}</strong></div>
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('Title') }}<small class="text-danger">*</small></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title...">
                </div>

                <label for="content">{{ __('Content')}} </label>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="form-group">
                            <textarea id="content-text-area" class="form-control" name="content" id="content" rows="15"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="published" id="published" value="1">
                                    <label class="custom-control-label" for="published">{{ __('Published') }}</label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" name="slug" id="slug" class="form-control">
                                    <small class="text-muted">You can leave this empty, We will create it for you!</small>
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}<small class="text-danger">*</small></label>
                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                    <small class="text-muted">Description is a must for you or others to find this post.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
