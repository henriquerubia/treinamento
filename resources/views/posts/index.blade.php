@extends('template')

@section('content')

    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }} (<i>{{ $post->created_at }}</i>)</h2>
        <p>{{ $post->content }}</p>
        <hr>
    @endforeach

@endsection