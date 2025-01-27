<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            [
                'name' => 'John Junqueira Aranha',
                'apelidoprofissional' => 'Administrador do sistema',
                'genero' => 'Não identificado',
                'datadenascimento' => '2025/01/27',
                'celular' => 'Não identificado',
                'role' => 'admin',
                'email' => 'johncba2015@hotmail.com',
                'email_verified_at' => now(),
                'password'=> Hash::make('password'),
            ],
        ]);
    }
}
