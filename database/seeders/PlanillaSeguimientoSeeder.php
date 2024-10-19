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
                'fecha' => '2024-10-01',
                'identificadorObjet' => 2, 
            ],
            [
                'fecha' => '2024-10-01',
                'identificadorObjet' => 3, 
            ],
            [
                'fecha' => '2024-10-02',
                'identificadorObjet' => 4, 
            ],
            [
                'fecha' => '2024-10-02',
                'identificadorObjet' => 5,
            ],
        ]);
    }
}