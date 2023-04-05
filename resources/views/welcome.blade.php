<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <a href="/contacto">Contacto</a>
    <a href="{{ route('contacto') }}">Contacto (Ruta con nombre)</a>
    {{--  Imprime todo el objeto de user  --}}
    {{$user}}
    {{--  Imprime el atributo de nombre del objeto de user  --}}
    {{$user->name}}
</body>
</html>
