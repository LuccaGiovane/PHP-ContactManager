@extends('layouts.app')

@section('content')
    <h1>Criar Nova Categoria</h1>

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

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nome da Categoria:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Salvar Categoria</button>
    </form>
@endsection
