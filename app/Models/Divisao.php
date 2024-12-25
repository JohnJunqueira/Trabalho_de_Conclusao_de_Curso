<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisao extends Model
{
    use HasFactory;

    protected $table = "divisoes";

    protected $fillable = ['nomedivisoes', 'subcategoria_id'];

    public function acessarSubcategoria(){
        return $this->belongsTo(Subcategoria::class, 'subcategoria_id');
    }
} 
