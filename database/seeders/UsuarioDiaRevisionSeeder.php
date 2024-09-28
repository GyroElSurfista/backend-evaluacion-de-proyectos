<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioDiaRevisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('UsuarioDiaRevision')->insert([
            [
                'identificadorUsuar' => 2,
                'identificadorDiaRevis' => 1
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorDiaRevis' => 2
            ],
        ]);
    }
}
