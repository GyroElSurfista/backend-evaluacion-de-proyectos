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
                'nombre' => 'Cocoa (en curso)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-11-25',
                'costo' => 10000.0000,
                'siguienteFechaIniciDispo' => null,
                'identificadorGrupoEmpre' => 1,
                'diaRevis' => 'Lunes'
            ],
            [
                'nombre' => 'Melon (en curso)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 15000.0000,
                'siguienteFechaIniciDispo' => null,
                'identificadorGrupoEmpre' => 2,
                'diaRevis' => 'Lunes'
            ],
            [
                'nombre' => 'Cacao (sin iniciar)',
                'fechaInici' => '2025-09-01',
                'fechaFin' => '2025-12-02',
                'costo' => 20000.0000,
                'identificadorGrupoEmpre' => 3,
                'siguienteFechaIniciDispo' => '2025-09-25',
                'diaRevis' => 'Martes'
            ],
            [
                'nombre' => 'Café (en curso)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-03',
                'costo' => 25000.0000,
                'identificadorGrupoEmpre' => 4,
                'siguienteFechaIniciDispo' => null,
                'diaRevis' => 'Martes'
            ],
            [
                'nombre' => 'Sandía (finalizada)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-10-07',
                'costo' => 30000.0000,
                'identificadorGrupoEmpre' => 5,
                'siguienteFechaIniciDispo' => null,
                'diaRevis' => 'Lunes'
            ]
        ]);
    }
}
