<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = "enderecos";

    protected $fillable = ['cep', 'nomedarua', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'pontodereferencia', 'usuario_id'];

    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
