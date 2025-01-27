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
                'name' => 'John Junqueira Aranha',
                'email' => 'johncba2015@hotmail.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],

        ]);
    }
}
