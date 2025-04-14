<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Pessoa;
use Illuminate\Http\Request;


class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::with('pessoa')->paginate(10);
        return view('imoveis.index', compact('imoveis'));
    }

    public function create(){
        $pessoas = Pessoa::orderBy('nome')->get();
        return view('imoveis.create', compact('pessoas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:20',
            'bairro' => 'required|max:50',
            'complemento' => 'nullable|max:255',
            'pessoa_id' => 'required|exists:pessoas,id'
        ]);

        Imovel::create($validated);
        return redirect()->route('imoveis.index')
            ->with('success', 'Imovel cadastrado!');
    }

    public function show(string $id)
    {
        $imovel = Imovel::with('pessoa')->findOrFail($id);
        return view('imoveis.show', compact('imovel'));
    }

    public function edit(string $id)
    {
        $imovel = Imovel::findOrFail($id);
        $pessoas = Pessoa::orderBy('nome')->get();
        return view('imoveis.edit', compact('imovel', 'pessoas'));
    }

    public function update(Request $request, string $id)
    {
        $imovel = Imovel::findOrFail($id);

        $validated = $request->validate([
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'pessoa_id' => 'required|exists:pessoas,id'
        ]);

        $imovel->update($validated);

        return redirect()->route('imoveis.index')
            ->with('success', 'Imovel atualizado!');
    }


    public function destroy($imovel)
    {
        try {
            $registro = Imovel::findOrFail($imovel);
            $registro->delete();

            return redirect()->route('imoveis.index')
                ->with('success', 'Imóvel excluído com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao excluir imóvel: ' . $e->getMessage());
        }
    }
}
