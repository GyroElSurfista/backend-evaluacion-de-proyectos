<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Actividad')->insert([
            [
                'nombre' => 'Planificación Inicial',
                'descripcion' => 'Definir el alcance del proyecto',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-17',
                'identificadorUsua' => 1,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo A',
                'descripcion' => 'Implementar las funcionalidades del módulo A',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-17',
                'identificadorUsua' => 6,
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Pruebas del Módulo A',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-17',
                'identificadorUsua' => 7,
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Desarrollo del Módulo B',
                'descripcion' => 'Implementar las funcionalidades del módulo B',
                'fechaInici' => '2024-09-18',
                'fechaFin' => '2024-09-25',
                'identificadorUsua' => 8,
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Pruebas del Módulo B',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-18',
                'fechaFin' => '2024-09-25',
                'identificadorUsua' => 1,
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Desarrollo del Módulo C',
                'descripcion' => 'Implementar las funcionalidades del módulo C',
                'fechaInici' => '2024-09-26',
                'fechaFin' => '2024-10-03',
                'identificadorUsua' => 6,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Pruebas del Módulo C',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-26',
                'fechaFin' => '2024-10-03',
                'identificadorUsua' => 7,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo D',
                'descripcion' => 'Implementar las funcionalidades del módulo D',
                'fechaInici' => '2024-10-04',
                'fechaFin' => '2024-10-11',
                'identificadorUsua' => 8,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Pruebas del Módulo D',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-10-04',
                'fechaFin' => '2024-10-11',
                'identificadorUsua' => 1,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo E',
                'descripcion' => 'Implementar las funcionalidades del módulo E',
                'fechaInici' => '2024-10-12',
                'fechaFin' => '2024-10-19',
                'identificadorUsua' => 6,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Pruebas del Módulo E',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-10-12',
                'fechaFin' => '2024-10-19',
                'identificadorUsua' => 7,
                'identificadorObjet' => 1,
            ]
        ]);
    }
}
