<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pegar todos os contatos (carregando a categoria relacionada)
        $contacts = Contact::with('category')->get();

        // Pegar todas as categorias
        $categories = Category::all();

        // Enviar para a view home.blade.php
        return view('home', compact('contacts', 'categories'));
    }
}