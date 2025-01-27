<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "ofertas";

    protected $fillable = ['titulodaoferta', 'descricaodaoferta', 'urgencia', 'valorestimado', 'datapublicacao', 'datalimite', 'status', 'localizacao', 'contatodisponivel', 'anexo', 'frequencia', 'disponibilidadecliente', 'usuario_id', 'categoria_id'];

    
    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function acessarCategoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
