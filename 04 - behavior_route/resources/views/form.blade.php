<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <title>Formulário :: Teste de Rotas</title>
</head>
<body>

<div class="container">
    <form action="{{url('/users')}}" method="post">
        @csrf
        @method('DELETE')

        <div class="form-group mt-3">
            <label for="first_name">Primeiro nome</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>

        <div class="form-group mt-3">
            <label for="last_name">Segundo nome</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>

        <div class="form-group mt-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Enviar!</button>
    </form>
</div>

<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
