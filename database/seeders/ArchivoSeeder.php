<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Archivo')->insert([
            [
                'ruta' => 'uploads/documento1.pdf',
                'fechaSubid' => '2024-09-03',
                'identificadorGrupoEmpre' => 1, 
            ],
            [
                'ruta' => 'uploads/documento2.pdf',
                'fechaSubid' => '2024-09-03',
                'identificadorGrupoEmpre' => 2, 
            ],
            [
                'ruta' => 'uploads/documento3.pdf',
                'fechaSubid' => '2024-09-03',
                'identificadorGrupoEmpre' => 3, 
            ],
            [
                'ruta' => 'uploads/documento4.pdf',
                'fechaSubid' => '2024-09-04',
                'identificadorGrupoEmpre' => 4, 
            ],
            [
                'ruta' => 'uploads/documento5.pdf',
                'fechaSubid' => '2024-09-04',
                'identificadorGrupoEmpre' => 5, 
            ],
        ]);
    }
}