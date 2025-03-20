<!-- resources/views/contacts/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Criar Novo Contato</h1>

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

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="category_id">Categoria:</label>
            <select name="category_id" id="category_id">
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Salvar Contato</button>
    </form>
@endsection
