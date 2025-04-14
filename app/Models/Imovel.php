<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{

    protected $table = 'imoveis';
    use HasFactory;

    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'pessoa_id',
    ];

    // imovel pertence a pessoa
    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
    }

    // acesso para endereço
    public function getEnderecoCompletoAttribute():string {
        return "{$this->logradouro}, {$this->numero}, {$this->bairro}";
    }


}
