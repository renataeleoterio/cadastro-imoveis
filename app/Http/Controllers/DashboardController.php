<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index',[
            'pessoas' => Pessoa::latest()->paginate(10),
            'imoveis' => Imovel::with('pessoa')->paginate(10, ['*'], 'imoveis_page')
            ]);
    }
}
