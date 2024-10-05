<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionInterfazUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('FuncionInterfazUsuario')->insert([
            [
                'identificadorFunci' => 1,
                'identificadorInter' => 1,
            ],
            [
                'identificadorFunci' => 1,
                'identificadorInter' => 2,
            ],
            [
                'identificadorFunci' => 1,
                'identificadorInter' => 3,
            ],
            [
                'identificadorFunci' => 1,
                'identificadorInter' => 4,
            ],
            [
                'identificadorFunci' => 1,
                'identificadorInter' => 5,
            ],
        ]);
    }
}