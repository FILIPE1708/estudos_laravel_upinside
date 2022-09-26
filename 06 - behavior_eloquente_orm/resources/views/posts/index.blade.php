<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

<div class="container my-5">
    <a href="{{route('posts.create')}}" class="btn btn-success mb-5">Cadastrar novo artigo</a>
    <a href="{{route('posts.trashed')}}" class="btn btn-warning mb-5">Ver lixeira</a>
    @if(!empty($posts))
        <section class="articles_list">
            @foreach($posts as $post)
                <article class="mb-5">
                    <h1>{{$post->title}}</h1>
                    <h2>{{$post->subtitle}}</h2>
                    <p>{{$post->description}}</p>
                    <small>Criado em: {{date('d/m/Y H:i', strtotime($post->created_at))}} - Editado em: {{date('d/m/Y H:i', strtotime($post->updated_at))}} </small>
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary mt-2">Editar</a>
                        <button type="submit" class="btn btn-danger mt-2">Excluir</button>
                    </form>
                </article>
                <hr>
            @endforeach
        </section>
    @endif
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
