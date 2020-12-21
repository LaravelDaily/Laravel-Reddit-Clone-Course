@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        @if ($post->post_url != '')
                            <div class="mb-2">
                                <a href="{{ $post->post_url }}" target="_blank">{{ $post->post_url }}</a>
                            </div>
                        @endif
                        @if ($post->post_image != '')
                            <img src="{{ asset('storage/posts/' . $post->id . '/thumbnail_' . $post->post_image) }}"/>
                            <br /><br />
                        @endif
                        {{ $post->post_text }}

                        @auth
                            @if ($post->user_id == auth()->id())
                                <hr/>
                                <a href="{{ route('communities.posts.edit', [$community, $post]) }}"
                                   class="btn btn-sm btn-primary">Edit post</a>

                                <form action="{{ route('communities.posts.destroy', [$community, $post]) }}"
                                      method="POST"
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete post
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
