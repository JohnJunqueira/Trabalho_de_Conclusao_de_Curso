<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use HasFactory; //SoftDeletes;

    protected $table = "enderecos";

    protected $fillable = ['cep', 'nomedarua', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'pontodereferencia', 'usuario_id'];

    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
