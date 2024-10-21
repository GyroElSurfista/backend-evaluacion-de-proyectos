<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanillaSeguimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('PlanillaSeguimiento')->insert([
            [
                'fecha' => '2024-10-01',
                'identificadorObjet' => 1, 
            ],
            [
                'fecha' => '2024-10-08',
                'identificadorObjet' => 1, 
            ],
            [
                'fecha' => '2024-10-15',
                'identificadorObjet' => 1, 
            ],
            [
                'fecha' => '2024-10-22',
                'identificadorObjet' => 1, 
            ],
            [
                'fecha' => '2024-10-29',
                'identificadorObjet' => 1,
            ],
            [
                'fecha' => '2024-10-02',
                'identificadorObjet' => 2,
            ],
            [
                'fecha' => '2024-10-09',
                'identificadorObjet' => 2,
            ],
            [
                'fecha' => '2024-10-16',
                'identificadorObjet' => 2,
            ],
            [
                'fecha' => '2024-10-23',
                'identificadorObjet' => 2,
            ],
        ]);
    }
}