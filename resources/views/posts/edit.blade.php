@extends('layouts.app')

@section('content')
<div id="post-index-page" class="container">
    <div class="card">
        <div class="card-header">
            <div class="mr-auto align-self-center"><strong>{{__('Edit A Post')}}</strong></div>
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('Title') }}<small class="text-danger">*</small></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title..." value="{{ $post->title }}">
                    @error('title')
                        <div class="div">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                    @enderror
                </div>

                <label for="content">{{ __('Content')}} </label>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <textarea id="content-text-area" class="form-control" name="content" id="content" rows="15"> {{ $post->content }} </textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input @error('published') is-invalid @enderror" name="published" id="published" value="1" {{ $post->published ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="published">{{ __('Published') }}</label>
                                </div>
                                @error('published')
                                    <div class="error">
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $post->slug }}">
                                    @error('slug')
                                        <div class="error">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                    <small class="text-muted">You can leave this empty, We will create it for you!</small>
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}<small class="text-danger">*</small></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5">{{ $post->description }}</textarea>
                                    @error('description')
                                        <div class="error">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                    <small class="text-muted">Description is a must for You or others to find this post!</small>
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
