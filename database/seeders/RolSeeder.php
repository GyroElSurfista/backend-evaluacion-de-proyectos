<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rol')->insert([
            [
                'descripcion' => 'Administrador del sistema',
            ],
            [
                'descripcion' => 'Docente',
            ],
            [
                'descripcion' => 'Socio GrupoEmpresa',
            ],
        ]);
    }
}