<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisao extends Model
{
    use HasFactory;

    protected $table = "divisoes";

    protected $fillable = ['nomedivisoes', 'categoria_id'];

    public function acessarCategoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
