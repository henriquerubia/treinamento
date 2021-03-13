@extends('template')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Bem-vindo ao Blogado!</h1>
            <p>Isso aqui ainda vai pegar fogo, karol agarrando o Bill, bebe chorando, globo da morte trabaiando,  moto estralando, engrenagem enpenando. Arrebentando arame, biela batendo, gil chamando pocah de Basculho, globo da morte trabaiando, vaca entrando no meio de roça!, menino correndo, arrebentando arame,  moto estralando, menino correndo. (by Lumena Ipsum)</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('admin.posts.create') }}" role="button">Publique sua postagem &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        @foreach($posts as $post)
            <h2>{{ $post->title }} (<i>{{ $post->created_at }}</i>)</h2>
            <p>{{ $post->content }}</p><br>
            <p><b>Tags:</b>
                @foreach($post->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
            </p>

            <h5>Comments</h5>
            @foreach($post->comments as $comment)
                <b>{{ $comment->name }}:</b> {{  $comment->comment }} <br>
            @endforeach
            <hr>
        @endforeach

        {{ $posts->render() }}
    </div>

@endsection