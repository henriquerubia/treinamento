@extends('template')

@section('content')
    <div class="container">
        <br>
        <h1>Create new Post</h1>
        <br>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


        {{  Form::open(['route' => 'admin.posts.store', 'method'=>'post']) }}

        @include('admin.posts._form')

        <div class="form-group">
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::text('tags', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>

@endsection