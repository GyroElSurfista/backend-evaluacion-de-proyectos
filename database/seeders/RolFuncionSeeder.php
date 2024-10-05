<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolFuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('RolFuncion')->insert([
            [
                'identificadorRol' => 1,
                'identificadorFunci' => 1,
            ],
            [
                'identificadorRol' => 1,
                'identificadorFunci' => 2,
            ],
            [
                'identificadorRol' => 2,
                'identificadorFunci' => 3,
            ],
            [
                'identificadorRol' => 3,
                'identificadorFunci' => 4,
            ],
            [
                'identificadorRol' => 2,
                'identificadorFunci' => 5,
            ],
        ]);
    }
}