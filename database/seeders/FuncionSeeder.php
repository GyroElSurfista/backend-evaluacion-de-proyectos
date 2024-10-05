<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Funcion')->insert([
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Gestiona el sistema y los usuarios',
                'activo' => true,
            ],
            [
                'nombre' => 'Editor',
                'descripcion' => 'Edita y publica contenido',
                'activo' => true,
            ],
            [
                'nombre' => 'Moderador',
                'descripcion' => 'Modera los comentarios y usuarios',
                'activo' => true,
            ],
            [
                'nombre' => 'Usuario',
                'descripcion' => 'Usuario regular con acceso limitado',
                'activo' => true,
            ],
            [
                'nombre' => 'Invitado',
                'descripcion' => 'Usuario con acceso temporal',
                'activo' => false,
            ],
        ]);
    }
}