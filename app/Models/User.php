<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable; //SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apelidoprofissional',
        'genero',
        'datadenascimento',
        'celular',
        'email',
        'password',
        'role', // Adicione este campo
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'usuario_id'); // Certifique-se que o campo 'usuario_id' existe na tabela endereços
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'usuario_id'); // Certifique-se que o campo 'usuario_id' existe na tabela ofertas
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'usuario_id'); // Certifique-se que o campo 'usuario_id' existe na tabela serviços
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
