@extends('layouts.app')

@section('content')
    <h1>Lista de Categorias</h1>
    <a href="{{ route('categories.create') }}">Adicionar Nova Categoria</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($categories->count() > 0)
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}">Editar</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Deseja remover esta categoria?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhuma categoria cadastrada.</p>
    @endif
@endsection
