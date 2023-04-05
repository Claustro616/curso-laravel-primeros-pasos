<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ $name }}
    <h1>{{ $age }}</h1>
    {{--  para que lea las etiquetas html se debe de quitar unos corchetes  --}}
    {{--  y ademas agregar signos de exclamación  --}}
    {!! $html !!}

    @if (true)
        Es True
    @endif

    @if ($name == 'Claudi')
        Huevo
    @else
        No es true
    @endif

    @foreach ($array as $a)
        <div class="class item">
            <p>{{$a}}</p>
        </div>
    @endforeach

    @forelse ($array as $a)
    <div class="class item">
        <p>*{{$a}}</p>
    </div>
    @empty
        <p>No hay data</p>
    @endforelse

</body>

</html>
