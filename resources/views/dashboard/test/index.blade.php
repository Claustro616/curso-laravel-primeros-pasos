@extends("layout.master")

@section("content")
@include('fragment.subview')
{{--  @include('fragment.subview')
@include('fragment.subview')
@include('fragment.subview')
@include('fragment.subview')


{{ $name }}
<h1>{{ $age }}</h1>  --}}
{{--  para que lea las etiquetas html se debe de quitar unos corchetes  --}}
{{--  y ademas agregar signos de exclamación  --}}
{{--  {!! $html !!}

@if (true)
    Es True
@endif

@if ($name == 'Claudi')
    Huevo
@else
    No es true
@endif

@foreach ($array as $a)
@include('fragment.subview')
    <div class="class item">
        <p>{{ $a }}</p>
    </div>
@endforeach

@forelse ($array as $a)
    <div class="class item">
        <p>*{{ $a }}</p>
    </div>
@empty
    <p>No hay data</p>
@endforelse  --}}

@forelse ($post as $a)
    <div class="box item">
        <p>*{{ $a }}</p>
    </div>
@empty
    <p>No hay data</p>
@endforelse

{{$name}}

@endsection
