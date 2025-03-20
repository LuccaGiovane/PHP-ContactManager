<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Exibe a lista de contatos
    public function index()
    {
        $contacts = Contact::with('category')->get();
        return view('contacts.index', compact('contacts'));
    }

    // Mostra o formulário para criar um novo contato
    public function create()
    {
        $categories = Category::all();
        return view('contacts.create', compact('categories'));
    }

    // Salva o novo contato
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:contacts',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    // Exibe os detalhes de um contato específico
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Mostra o formulário para editar um contato
    public function edit(Contact $contact)
    {
        $categories = Category::all();
        return view('contacts.edit', compact('contact', 'categories'));
    }

    // Atualiza os dados do contato
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    // Remove o contato
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contato removido com sucesso!');
    }
}