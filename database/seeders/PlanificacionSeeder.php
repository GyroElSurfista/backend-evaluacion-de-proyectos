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
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 10000.0000,
                'identificadorGrupoEmpresa' => 1, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 15000.0000,
                'identificadorGrupoEmpresa' => 2, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 20000.0000,
                'identificadorGrupoEmpresa' => 3, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 25000.0000,
                'identificadorGrupoEmpresa' => 4, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-12-02',
                'costo' => 30000.0000,
                'identificadorGrupoEmpresa' => 5, 
            ],
        ]);
    }
}