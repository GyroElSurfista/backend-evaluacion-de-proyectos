<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuarioRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('UsuarioRol')->insert([
            [
                'fechaDesde' => Carbon::create('2024', '01', '09'),
                'fechaHasta' => Carbon::create('2024', '12', '31'),
                'identificadorUsua' => 1,
                'identificadorRol' => 1,
            ],
            [
                'fechaDesde' => Carbon::create('2024', '01', '09'),
                'fechaHasta' => Carbon::create('2024', '12', '31'),
                'identificadorUsua' => 2,
                'identificadorRol' => 2,
            ],
            [
                'fechaDesde' => Carbon::create('2024', '01', '09'),
                'fechaHasta' => Carbon::create('2024', '12', '31'),
                'identificadorUsua' => 3,
                'identificadorRol' => 3,
            ],
            [
                'fechaDesde' => Carbon::create('2024', '01', '09'),
                'fechaHasta' => Carbon::create('2024', '12', '31'),
                'identificadorUsua' => 4,
                'identificadorRol' => 3,
            ],
            [
                'fechaDesde' => Carbon::create('2024', '01', '09'),
                'fechaHasta' => Carbon::create('2024', '12', '31'),
                'identificadorUsua' => 5,
                'identificadorRol' => 3,
            ],
        ]);
    }
}