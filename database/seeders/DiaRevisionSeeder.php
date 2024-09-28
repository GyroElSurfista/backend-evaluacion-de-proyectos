<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DiaRevisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('DiaRevision')->insert([
            [
                'nombre' => 'Lunes',
            ],
            [
                'nombre' => 'Martes',
            ],
            [
                'nombre' => 'Miercoles',
            ],
            [
                'nombre' => 'Jueves',
            ],
            [
                'nombre' => 'Viernes',
            ],
            [
                'nombre' => 'Sabado',
            ],
            [
                'nombre' => 'Domingo',
            ],
        ]);
    }
}
