@extends('dashboard.layout')

@section('content')
    <a class="btn btn-success" href="{{ route('post.create') }}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                <th>
                    Categoria
                </th>
                <th>
                    Posteado
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{ $p->title }}
                    </td>
                    <td>
                        {{$p->category->title}}
                    </td>
                    <td>
                        {{ $p->posted }}
                    </td>
                    <td>
                        {{-- $p->id --}}
                        <a class="btn btn-primary" href="{{ route('post.edit', $p) }}">Editar</a>
                        <a class="btn btn-primary" href="{{ route('post.show', $p) }}">Ver</a>
                        <form action="{{ route('post.destroy', $p) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
