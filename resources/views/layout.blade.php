<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Controle de Series</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
    <a class="navbar navbar-expand-lg" href="{{ route('listar_series') }}">Home</a>
    @auth
        <a href="/sair" class="text-danger"> Sair</a>
    @endauth
    @guest
        <a href="/entrar" class="text-primary"> Entrar</a>
    @endguest
</nav>
<div class="container">
    <div class="jumbotron">
        <h1>
            @yield('cabecalho')
        </h1>
    </div>

    @yield('conteudo')
</div>
</body>
</html>
