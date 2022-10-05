<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('imoveis.store')}}" enctype="multipart/form-data" method="post">
    @csrf

    <label for="title">Título</label>
    <input type="text" name="title">

    <label for="rental_price">Preço de Locação</label>
    <input type="text" name="rental_price">

    <label for="cover">Imagem de destaque</label>
    <input type="file" name="cover" >

    <button type="submit">Gravar Imóvel</button>
</form>
</body>
</html>
