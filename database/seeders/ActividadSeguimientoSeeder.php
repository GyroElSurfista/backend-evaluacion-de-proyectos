<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeguimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ActividadSeguimiento')->insert([
            [
                'nombre' => 'Revisión de requisitos',
                'identificadorPlaniSegui' => 1,
            ],
            [
                'nombre' => 'Diseño de la base de datos',
                'identificadorPlaniSegui' => 1,
            ],
            [
                'nombre' => 'Implementación del backend',
                'identificadorPlaniSegui' => 1,
            ],
            [
                'nombre' => 'Implementación del frontend',
                'identificadorPlaniSegui' => 1,
            ],
            [
                'nombre' => 'Pruebas unitarias',
                'identificadorPlaniSegui' => 1,
            ],
            [
                'nombre' => 'Pruebas de integración',
                'identificadorPlaniSegui' => 2,
            ],
            [
                'nombre' => 'Despliegue en entorno de pruebas',
                'identificadorPlaniSegui' => 2,
            ],
            [
                'nombre' => 'Revisión de código',
                'identificadorPlaniSegui' => 2,
            ],
            [
                'nombre' => 'Documentación del proyecto',
                'identificadorPlaniSegui' => 2,
            ],
            [
                'nombre' => 'Entrega final',
                'identificadorPlaniSegui' => 2,
            ],
        ]);
    }
}