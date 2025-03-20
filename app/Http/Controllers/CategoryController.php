<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Lista de categorias
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Mostra o formulário para criar uma nova categoria
    public function create()
    {
        return view('categories.create');
    }

    // Salva a nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Exibe detalhes de uma categoria específica (opcional)
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Mostra o formulário para editar uma categoria
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Atualiza a categoria
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Remove a categoria
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria removida com sucesso!');
    }
}
