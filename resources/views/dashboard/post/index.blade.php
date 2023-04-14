@extends('dashboard.layout')

@section('content')
    <a href="{{ route('post.create') }}">Crear</a>

    <table>
        <thead>
            <tr>
                <td>
                    Titulo
                </td>
                <td>
                    Categoria
                </td>
                <td>
                    Posteado
                </td>
                <td>
                    Acciones
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <th>
                        {{ $p->title }}
                    </th>
                    <th>
                        {{$p->category->title}}
                    </th>
                    <th>
                        {{ $p->posted }}
                    </th>
                    <th>
                        {{-- $p->id --}}
                        <a href="{{ route('post.edit', $p) }}">Editar</a>
                        <a href="{{ route('post.show', $p) }}">Ver</a>
                        <form action="{{ route('post.destroy', $p) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Eliminar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
