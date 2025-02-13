<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use HasFactory; //SoftDeletes;

    protected $table = "ofertas";

    protected $fillable = ['titulodaoferta', 'descricaodaoferta', 'urgencia', 'valorestimado', 'datapublicacao', 'datalimite', 'status', 'localizacao', 'contatodisponivel', 'outroscontatos', 'frequencia', 'preferenciacliente', 'usuario_id', 'categoria_id', 'divisao_id'];


    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function acessarCategoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function acessarDivisao(){
        return $this->belongsTo(Divisao::class, 'divisao_id');
    }
}
