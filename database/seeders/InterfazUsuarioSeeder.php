<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterfazUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('InterfazUsuario')->insert([
            [
                'nombre' => 'Dashboard',
                'descripcion' => 'Panel principal del sistema',
                'activo' => true,
            ],
            [
                'nombre' => 'Perfil de Usuario',
                'descripcion' => 'Sección para gestionar el perfil del usuario',
                'activo' => true,
            ],
            [
                'nombre' => 'Configuración',
                'descripcion' => 'Opciones de configuración del sistema',
                'activo' => true,
            ],
            [
                'nombre' => 'Reportes',
                'descripcion' => 'Generación de reportes y estadísticas',
                'activo' => true,
            ],
            [
                'nombre' => 'Calificaciones',
                'descripcion' => 'Sección para gestionar las calificaciones',
                'activo' => false,
            ],
        ]);
    }
}