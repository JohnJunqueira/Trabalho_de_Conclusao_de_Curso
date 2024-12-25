<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = "ofertas";

    protected $fillable = ['titulodaoferta', 'descricaodaoferta', 'urgencia', 'valorestimado', 'datapublicacao', 'datalimite', 'status', 'localizacao', 'contatodisponivel', 'anexo', 'frequencia', 'disponibilidadecliente', 'usuario_id', 'categoria_id'];

    // Valores possíveis para o atributo ENUM URGENCIA
    const TIPO_ALTA = 'Alta';
    const TIPO_MEDIA = 'Média';
    const TIPO_BAIXA = 'Baixa';

    // Lista dos tipos permitidos
    public static function tiposUrgencia()
    {
        return [
            self::TIPO_ALTA,
            self::TIPO_MEDIA,
            self::TIPO_BAIXA,
        ];
    }

    public function setTipoUrgenciaAttribute($value)
{
    if (!in_array($value, self::tiposUrgencia())) {
        throw new \InvalidArgumentException("O tipo de urgencia '{$value}' é inválido.");
    }
    $this->attributes['urgencia'] = $value;
}

    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function acessarCategoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
 