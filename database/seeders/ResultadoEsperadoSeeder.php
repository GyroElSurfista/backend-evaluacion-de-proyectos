<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultadoEsperadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ResultadoEsperado')->insert([
            [
                'descripcion' => 'Base de datos actualizada',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Manuales de usuario actualizados',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Manual tecnico revisado',
                'identificadorActiv' => 3,
            ],
            [
                'descripcion' => 'Manual de instalacion actualizado',
                'identificadorActiv' => 4,
            ],
            [
                'descripcion' => 'Modelo ER revisado',
                'identificadorActiv' => 5,
            ],
        ]);
    }
}