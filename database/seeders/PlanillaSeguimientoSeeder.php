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
                'fecha' => '2024-09-02',
                'identificadorObjet' => 1,
            ],
            [
                'fecha' => '2024-09-09',
                'identificadorObjet' => 1,
            ],
            [
                'fecha' => '2024-09-16',
                'identificadorObjet' => 2,
            ],
        ]);
    }
}
