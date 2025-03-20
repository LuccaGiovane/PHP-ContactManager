@extends('layouts.app')

@section('content')
    <h1>Lista de Contatos</h1>
    <a href="{{ route('contacts.create') }}">Adicionar Novo Contato</a>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellspacing="0" cellpadding="5">
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
            @foreach($contacts as $contact)
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
@endsection