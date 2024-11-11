<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ActividadSeguimiento')->insert([
            [
                'identificadorUsuar' => 1,
                'fecha' => '2024-09-02',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 6,
                'fecha' => '2024-09-02',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 7,
                'fecha' => '2024-09-02',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 8,
                'fecha' => '2024-09-02',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 9,
                'fecha' => '2024-09-02',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 1,
                'fecha' => '2024-09-09',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 6,
                'fecha' => '2024-09-09',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 7,
                'fecha' => '2024-09-09',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 8,
                'fecha' => '2024-09-09',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 9,
                'fecha' => '2024-09-09',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 1,
                'fecha' => '2024-09-16',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 6,
                'fecha' => '2024-09-16',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 7,
                'fecha' => '2024-09-16',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 8,
                'fecha' => '2024-09-16',
                'valor' => true
            ],
            [
                'identificadorUsuar' => 9,
                'fecha' => '2024-09-16',
                'valor' => true
            ],
        ]);
    }
}
