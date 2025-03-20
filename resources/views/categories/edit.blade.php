@extends('layouts.app')

@section('content')
    <h1>Editar Categoria</h1>

    @if($errors->any())
        <div>
            <strong>Erro!</strong> Verifique os dados abaixo:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome da Categoria:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>

        <button type="submit">Atualizar Categoria</button>
    </form>
@endsection
