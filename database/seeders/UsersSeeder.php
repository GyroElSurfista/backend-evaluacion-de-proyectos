<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'identificadorPerso' => 1, 
                'identificadorGrupoEmpre' => 1, 
                'identificadorRol' => 1, 
            ],
            [
                'name' => 'María González',
                'email' => 'maria.gonzalez@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'identificadorPerso' => 2, 
                'identificadorGrupoEmpre' => 2, 
                'identificadorRol' => 2, 
            ],
            [
                'name' => 'Carlos Rodríguez',
                'email' => 'carlos.rodriguez@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'identificadorPerso' => 3, 
                'identificadorGrupoEmpre' => 3, 
                'identificadorRol' => 3, 
            ],
            [
                'name' => 'Ana Martínez',
                'email' => 'ana.martinez@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'identificadorPerso' => 4, 
                'identificadorGrupoEmpre' => 4, 
                'identificadorRol' => 3, 
            ],
            [
                'name' => 'Luis Fernández',
                'email' => 'luis.fernandez@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'identificadorPerso' => 5, 
                'identificadorGrupoEmpre' => 5, 
                'identificadorRol' => 3, 
            ],
        ]);
    }
}