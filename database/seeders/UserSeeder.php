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
                'status' => 'active',
                'password' => bcrypt('password')
            ],

            [
                'name' => 'Prestador',
                'email' => 'prestador@gmail.com',
                'role' => 'prestador',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            
            [
                'name' => 'Cliente user',
                'email' => 'usercliente@gmail.com',
                'role' => 'usercliente',
                'status' => 'active',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
