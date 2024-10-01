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
                'resultadoEsper' => 'Planificacion lista',
                'identificadorUsua' => 3,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrollo del Módulo A',
                'descripcion' => 'Implementar las funcionalidades del módulo A',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-17',
                'resultadoEsper' => 'Modulo A listo',
                'identificadorUsua' => 4,
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Pruebas del Módulo A',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-17',
                'resultadoEsper' => 'Pruebas listas',
                'identificadorUsua' => 5,
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Desarrollo del Módulo B',
                'descripcion' => 'Implementar las funcionalidades del módulo B',
                'fechaInici' => '2024-09-18',
                'fechaFin' => '2024-09-25',
                'resultadoEsper' => 'Modulo B listo',
                'identificadorUsua' => 3,
                'identificadorObjet' => 4,
            ],
            [
                'nombre' => 'Pruebas del Módulo B',
                'descripcion' => 'Realizar pruebas unitarias y de integración',
                'fechaInici' => '2024-09-18',
                'fechaFin' => '2024-09-25',
                'resultadoEsper' => 'Pruebas listas',
                'identificadorUsua' => 4,
                'identificadorObjet' => 5,
            ],
        ]);
    }
}
