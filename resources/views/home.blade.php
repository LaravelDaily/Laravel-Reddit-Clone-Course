@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Most Popular Posts</div>

        <div class="card-body">
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col-1 text-center">
                        <div>
                            <a href="{{ route('post.vote', [$post->id, 1]) }}"><i class="fa fa-2x fa-sort-asc"
                                                                                  aria-hidden="true"></i></a>
                        </div>
                        <div style="font-size: 24px; font-weight: bold">{{ $post->votes }}</div>
                        <div>
                            <a href="{{ route('post.vote', [$post->id, -1]) }}"><i class="fa fa-2x fa-sort-desc"
                                                                                   aria-hidden="true"></i></a></div>
                    </div>
                    <div class="col-11">
                        <a href="{{ route('communities.posts.show', [$post->community, $post]) }}">
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
