<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Planificacion')->insert([
            [
                'nombre' => 'Reserva de aulas Pomelo',
                'fechaInici' => '2024-02-12',
                'fechaFin' => '2024-06-12',
                'costo' => 16754.0000,
                'siguienteFechaIniciDispo' => null,
                'identificadorGrupoEmpre' => 1,
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Reserva de aulas Arándano',
                'fechaInici' => '2024-02-12',
                'fechaFin' => '2024-06-12',
                'costo' => 25891.0000,
                'siguienteFechaIniciDispo' => null,
                'identificadorGrupoEmpre' => 2,
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Evaluación basada en proyectos Cocoa',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-12-11',
                'costo' => 65430.0000,
                'identificadorGrupoEmpre' => 3,
                'siguienteFechaIniciDispo' => '2024-12-05',
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Evaluación basada en proyectos Café',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-12-11',
                'costo' => 57621.0000,
                'identificadorGrupoEmpre' => 4,
                'siguienteFechaIniciDispo' => null,
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Gestión mantenimiento de maquinaria Sandía',
                'fechaInici' => '2025-02-12',
                'fechaFin' => '2025-06-11',
                'costo' => 78521.0000,
                'identificadorGrupoEmpre' => 5,
                'siguienteFechaIniciDispo' => '2025-02-12',
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Gestión mantenimiento de maquinaria Fresa',
                'fechaInici' => '2025-02-12',
                'fechaFin' => '2025-06-11',
                'costo' => 58521.0000,
                'identificadorGrupoEmpre' => 6,
                'siguienteFechaIniciDispo' => '2025-02-12',
                'diaRevis' => 'Miércoles'
            ]
        ]);
    }
}
