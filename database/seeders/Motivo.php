<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Motivo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Motivo')->insert(
            [
                [
                    'descripcion' => 'Licencia'
                ],
                [
                    'descripcion' => 'Imprevisto'
                ],
                [
                    'descripcion' => 'Injustificado'
                ],
            ]
        );
    }
}
