<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory; //SoftDeletes;

    protected $table = "categorias";

    protected $fillable = ['nomecategoria'];


    public function divisoes()
    {
        return $this->hasMany(Divisao::class, 'categoria_id'); // Certifique-se que o campo 'categoria_id' existe na tabela divisões
    }

}
