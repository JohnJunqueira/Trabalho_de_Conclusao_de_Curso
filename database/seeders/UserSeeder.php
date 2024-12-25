<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Junqueira',
                'email' => 'johncba2015@hotmail.com',
                'role' => 'admin',
                //'status' => 'active',
                'password' => bcrypt('password')
            ],

            [
                'name' => 'João Prestador',
                'email' => 'joaoprestador@gmail.com',
                'role' => 'prestador',
                //'status' => 'active',
                'password' => bcrypt('password')
                //'apelidoprofissional' => 'Prestador João',
                //'genero' => 'Masculino',
                //'datadenascimento' => '23/09/1965',
                //'celular' => '(77) 981098254'
            ],

            [
                'name' => 'Cliente user Maria',
                'email' => 'mariausercliente@gmail.com',
                'role' => 'usercliente',
                //'status' => 'active',
                'password' => bcrypt('password'),
                //'apelidoprofissional' => 'Cliente Maria',
                //'genero' => 'Feminino',
                //'datadenascimento' => '25/04/1980',
                //'celular' => '(77) 981765432'
            ]
        ]);
    }
}
