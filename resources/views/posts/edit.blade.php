@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $community->name }}: Edit Post</div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('communities.posts.update', [$community, $post]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}
                        *</label>

                    <div class="col-md-6">
                        <input id="title" type="text"
                               class="form-control @error('title') is-invalid @enderror" name="title"
                               value="{{ $post->title }}" required autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_text"
                           class="col-md-4 col-form-label text-md-right">{{ __('Post Text') }}</label>

                    <div class="col-md-6">
                                    <textarea rows="10" class="form-control @error('post_text') is-invalid @enderror"
                                              name="post_text">{{ $post->post_text }}</textarea>

                        @error('post_text')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_url"
                           class="col-md-4 col-form-label text-md-right">{{ __('URL Link') }}</label>

                    <div class="col-md-6">
                        <input id="post_url" type="text"
                               class="form-control @error('post_url') is-invalid @enderror" name="post_url"
                               value="{{ $post->post_url }}">

                        @error('post_url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_image"
                           class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input type="file" name="post_image"/>

                        @error('post_image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Post') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
