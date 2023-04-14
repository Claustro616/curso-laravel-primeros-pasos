
@extends('dashboard.layout')
@section('content')
<h1>Crear Post</h1>
@include('dashboard.fragment._errors-form')
{{--  @if ($errors->any())
    @foreach ($errors->all() as $e)
        <div class="error">
            {{$e}}
        </div>
    @endforeach
@endif  --}}
<form action="{{route('post.store')}}" method="post">
    @include('dashboard.post._form')
</form>
@endsection
