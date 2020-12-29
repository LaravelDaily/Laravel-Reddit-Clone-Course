@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Most Popular Posts</div>

        <div class="card-body">
            @foreach ($posts as $post)
                <div class="row">
                    @livewire('post-votes', ['post' => $post])
                    <div class="col-11">
                        <a href="{{ route('communities.posts.show', [$post->id]) }}">
                            <h2>{{ $post->title }}</h2>
                        </a>
                        <p>{{ $post->created_at->diffForHumans() }}</p>
                        <p>{{ \Illuminate\Support\Str::words($post->post_text, 10) }}</p>
                    </div>
                </div>
                <hr/>
            @endforeach
        </div>
    </div>
@endsection
