@extends('template')

@section('content')

    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }} (<i>{{ $post->created_at }}</i>)</h2>
        <p>{{ $post->content }}</p><br>
        <p><b>Tags:</b>
            @foreach($post->tags as $tag)
                <span class="badge bg-secondary">{{ $tag->name }}</span>
            @endforeach
        </p>

        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <b>Name:</b> {{ $comment->name }} <br>
            <b>Comment:</b> {{  $comment->comment }} <br>
        @endforeach
        <hr>
    @endforeach

    {{ $posts->render() }}

@endsection