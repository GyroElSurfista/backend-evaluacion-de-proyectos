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
                'nombre' => 'Cocoa',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 10000.0000,
                'identificadorGrupoEmpre' => 1,
                'diaRevis' => 'Lunes'
            ],
            [
                'nombre' => 'Melon',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 15000.0000,
                'identificadorGrupoEmpre' => 2,
                'diaRevis' => 'Lunes'
            ],
            [
                'nombre' => 'Cacao',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 20000.0000,
                'identificadorGrupoEmpre' => 3,
                'diaRevis' => 'Martes'
            ],
            [
                'nombre' => 'Café',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 25000.0000,
                'identificadorGrupoEmpre' => 4,
                'diaRevis' => 'Martes'
            ],
            [
                'nombre' => 'Sandía',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 30000.0000,
                'identificadorGrupoEmpre' => 5,
                'diaRevis' => 'Lunes'
            ],
        ]);
    }
}
