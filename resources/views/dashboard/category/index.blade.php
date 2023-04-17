@extends('dashboard.layout')

@section('content')
    <a class="btn btn-success" href="{{ route('category.create') }}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <td>
                    Titulo
                </td>
                <td>
                    Acciones
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <th>
                        {{ $c->title }}
                    </th>
                    <th>
                        <a class="btn btn-primary" href="{{ route('category.edit', $c) }}">Editar</a>
                        <a class="btn btn-primary" href="{{ route('category.show', $c) }}">Ver</a>
                        <form action="{{ route('category.destroy', $c) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button  class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
