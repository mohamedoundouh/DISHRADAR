<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuario con rol admin
        DB::table('users')->insert([
            'dni' => '123456789',
            'nick' => 'admin_user',
            'nombre' => 'Admin',
            'apellidos' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'),
            'fecha_nacimiento' => now(),
            'rol' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear usuario con rol user
        DB::table('users')->insert([
            'dni' => '987654321',
            'nick' => 'user_user',
            'nombre' => 'User',
            'apellidos' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('1234'),
            'fecha_nacimiento' => now(),
            'rol' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

