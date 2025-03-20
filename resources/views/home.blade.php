@extends('layouts.app')

@section('content')
    <h1>Gerenciador de Contatos e Categorias</h1>

    {{-- Exibir tabela de contatos --}}
    <h2>Lista de Contatos</h2>
    <a href="{{ route('contacts.create') }}">Adicionar Novo Contato</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->category ? $contact->category->name : 'Sem categoria' }}</td>
                <td>
                    <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja remover este contato?')">Remover</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <hr>

    {{-- Exibir tabela de categorias --}}
    <h2>Lista de Categorias</h2>
    <a href="{{ route('categories.create') }}">Adicionar Nova Categoria</a>

    {{-- Se houver alguma categoria, mostre a tabela --}}
    @if($categories->count() > 0)
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Categoria</th>
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
