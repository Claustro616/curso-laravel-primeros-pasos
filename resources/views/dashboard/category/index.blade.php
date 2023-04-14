@extends('dashboard.layout')

@section('content')
    <a href="{{ route('category.create') }}">Crear</a>

    <table>
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
                        <a href="{{ route('category.edit', $c) }}">Editar</a>
                        <a href="{{ route('category.show', $c) }}">Ver</a>
                        <form action="{{ route('category.destroy', $c) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Eliminar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
