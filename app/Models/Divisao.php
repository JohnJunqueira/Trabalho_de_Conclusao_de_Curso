<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divisao extends Model
{
    use HasFactory; //SoftDeletes;

    protected $table = "divisoes";

    protected $fillable = ['nomedivisoes', 'categoria_id'];

    public function acessarCategoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'divisao_id'); // Certifique-se que o campo 'divisao_id' existe na tabela ofertas
    }
    public function servicos()
    {
        return $this->hasMany(Servico::class, 'divisao_id'); // Certifique-se que o campo 'divisao_id' existe na tabela serviços
    }
}
