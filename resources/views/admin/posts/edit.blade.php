@extends('template')

@section('content')
    <div class="container">
        <br>
        <h1>Edit Post: {{ $post->title }}</h1>
        <br>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{  Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method'=>'put']) }}

        @include('admin.posts._form')

        <div class="form-group">
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::text('tags', $post->getTagListAttribute(), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
    


@endsection