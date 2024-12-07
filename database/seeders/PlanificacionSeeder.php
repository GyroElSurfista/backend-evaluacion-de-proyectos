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
            // SEMESTRE I-2024
            [
                'nombre' => 'Evaluación basada en proyectos Cocoa',
                'fechaInici' => '2024-03-03',
                'fechaFin' => '2024-06-26',
                'costo' => 65430.0000,
                'identificadorGrupoEmpre' => 1,
                'siguienteFechaIniciDispo' => null,
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Evaluación basada en proyectos Café',
                'fechaInici' => '2024-03-03',
                'fechaFin' => '2024-06-26',
                'costo' => 57621.0000,
                'identificadorGrupoEmpre' => 2,
                'siguienteFechaIniciDispo' => null,
                'diaRevis' => 'Miércoles'
            ],

            // SEMESTRE II-2024
            [
                'nombre' => 'Proyectos de Innovación Durazno',
                'fechaInici' => '2025-01-01',
                'fechaFin' => '2025-03-25',
                'costo' => 65430.0000,
                'identificadorGrupoEmpre' => 3,
                'siguienteFechaIniciDispo' => '2025-01-01',
                'diaRevis' => 'Martes'
            ],
            [
                'nombre' => 'Proyectos de Desarrollo Manzana',
                'fechaInici' => '2025-01-01',
                'fechaFin' => '2025-03-25',
                'costo' => 57621.0000,
                'identificadorGrupoEmpre' => 4,
                'siguienteFechaIniciDispo' => '2025-01-01',
                'diaRevis' => 'Martes'
            ],

            // SEMESTRE III-2024
            [
                'nombre' => 'Reserva de aulas Pomelo',
                'fechaInici' => '2024-12-01',
                'fechaFin' => '2025-03-26',
                'costo' => 16754.0000,
                'siguienteFechaIniciDispo' => '2024-12-01',
                'identificadorGrupoEmpre' => 5,
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Reserva de aulas Arándano',
                'fechaInici' => '2024-12-01',
                'fechaFin' => '2025-03-26',
                'costo' => 25891.0000,
                'siguienteFechaIniciDispo' => '2024-12-01',
                'identificadorGrupoEmpre' => 6,
                'diaRevis' => 'Miércoles'
            ],

            // SEMESTRE IV-2024
            [
                'nombre' => 'Gestión mantenimiento de maquinaria Sandía',
                'fechaInici' => '2024-09-03',
                'fechaFin' => '2024-11-26',
                'costo' => 78521.0000,
                'identificadorGrupoEmpre' => 7,
                'siguienteFechaIniciDispo' => '2024-09-03',
                'diaRevis' => 'Miércoles'
            ],
            [
                'nombre' => 'Gestión mantenimiento de maquinaria Fresa',
                'fechaInici' => '2024-09-03',
                'fechaFin' => '2024-11-26',
                'costo' => 58521.0000,
                'identificadorGrupoEmpre' => 8,
                'siguienteFechaIniciDispo' => '2024-09-03',
                'diaRevis' => 'Miércoles'
            ],
        ]);
    }
}
