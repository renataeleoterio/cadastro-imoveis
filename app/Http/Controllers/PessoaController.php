<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PessoaController extends Controller
{
    // listar pessoas
    public function index(Request $request)
    {
        $query = Pessoa::query();

        if ($request->filled('search')) {
            $search = Str::ascii(trim($request->get('search'))); //remove acentos
            $search = preg_replace('/[^0-9a-zA-Z\s]/', '', $search); // filtra caracteres especiais

            if (!empty($search)) {
                $query->where(function($q) use ($search) {
                    $q->where('nome', 'like', "%{$search}%")
                        ->orWhere('cpf', 'like', "%{$search}%");
                });
            }
        }
        $pessoas = $query->paginate(10); // 10 itens por página
        $imoveis = Imovel::all();
        return view('pessoas.index', compact('pessoas', 'imoveis'));
    }

    // mostrar formulario
    public function create()
    {
        return view('pessoas.create');
    }

    // envia a request para cadastrar a pessoa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|string|unique:pessoas',
            'sexo' => 'required|in:M,F,Outro',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        Pessoa::create($validated);

        return redirect()->route('pessoas.index')->
        with('success', 'Pessoa cadastrada com sucesso!');
    }

    // mostrar formulario para edicao de pessoa
    public function edit(string $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    // atualizar pessoa
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|string|max:14|unique:pessoas,cpf,' . $id, // ignora o cpf da pessoa atual
            'sexo' => 'required|in:M,F,Outro',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',

        ]);

        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($validated);

        return redirect()->route('pessoas.index')->
        with('success', 'Pessoa atualizada com sucesso!');
    }


    // excluir pessoa
    public function destroy(string $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return redirect()->route('pessoas.index')->with('success', "Pessoa removida com sucesso!");
    }
}
