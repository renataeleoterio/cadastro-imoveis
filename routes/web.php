<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// rota para pessoas
Route::resource('pessoas', PessoaController::class);
// rota para imoveis
Route::resource('imoveis', ImovelController::class)->parameters([
    'imoveis' => 'imovel'
]);


