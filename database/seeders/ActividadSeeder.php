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
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-05',
                'identificadorUsua' => 1,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo C',
                'descripcion' => 'Implementar las funcionalidades del módulo C',
                'fechaInici' => '2024-09-06',
                'fechaFin' => '2024-09-08',
                'identificadorUsua' => 6,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Pruebas del Módulo C',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-08',
                'fechaFin' => '2024-09-09',
                'identificadorUsua' => 7,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo D',
                'descripcion' => 'Implementar las funcionalidades del módulo D',
                'fechaInici' => '2024-09-06',
                'fechaFin' => '2024-09-08',
                'identificadorUsua' => 8,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Pruebas del Módulo D',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-08',
                'fechaFin' => '2024-09-09',
                'identificadorUsua' => 1,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo E',
                'descripcion' => 'Implementar las funcionalidades del módulo E',
                'fechaInici' => '2024-09-06',
                'fechaFin' => '2024-09-08',
                'identificadorUsua' => 6,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Pruebas del Módulo E',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-08',
                'fechaFin' => '2024-09-09',
                'identificadorUsua' => 7,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo A',
                'descripcion' => 'Implementar las funcionalidades del módulo A',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-06',
                'identificadorUsua' => 6,
                'identificadorObjet' => 15,
            ],
            [
                'nombre' => 'Pruebas del Módulo A',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-07',
                'fechaFin' => '2024-09-09',
                'identificadorUsua' => 7,
                'identificadorObjet' => 15,
            ],
            [
                'nombre' => 'Desarrollo del Módulo B',
                'descripcion' => 'Implementar las funcionalidades del módulo B',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-06',
                'identificadorUsua' => 8,
                'identificadorObjet' => 15,
            ],
            [
                'nombre' => 'Pruebas del Módulo B',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-07',
                'fechaFin' => '2024-09-09',
                'identificadorUsua' => 1,
                'identificadorObjet' => 15,
            ]
        ]);
    }
}
