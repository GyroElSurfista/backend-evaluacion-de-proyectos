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
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Manual de instalacion actualizado',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Modelo ER revisado',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Modelo ER actualizado',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Funcionalidades de registro implementadas',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Funcionalidades de registro probadas',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Sistema finalizado',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Sistema probado',
                'identificadorActiv' => 2,
            ],
        ]);
    }
}