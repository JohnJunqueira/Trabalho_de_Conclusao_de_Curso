<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = "servicos";

    protected $fillable = ['titulodaespecialidade', 'descricaodaatividade', 'tempoexperiencia', 'servicosfrequentes', 'valormedio', 'formadetrabalho', 'formadepagamento', 'agendadisponivel', 'contatodisponivel', 'datacadastro', 'portfolio', 'regioesatendidas', 'usuario_id', 'categoria_id'];

    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function acessarCategoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
 