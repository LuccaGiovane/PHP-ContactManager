<!-- resources/views/contacts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Contato</h1>

    @if ($errors->any())
        <div>
            <strong>Erro!</strong> Verifique os dados abaixo:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $contact->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $contact->email }}" required>
        </div>
        <div>
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" value="{{ $contact->phone }}">
        </div>
        <div>
            <label for="category_id">Categoria:</label>
            <select name="category_id" id="category_id">
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $contact->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Atualizar Contato</button>
    </form>
@endsection
