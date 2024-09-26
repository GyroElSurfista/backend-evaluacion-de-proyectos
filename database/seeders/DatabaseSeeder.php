<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GrupoEmpresaSeeder::class,
            PlanificacionSeeder::class,
            ObjetivoSeeder::class,
            EntregableSeeder::class,
            CriterioAceptacionEntregableSeeder::class,
            EvaluacionObjetivoSeeder::class,
            RevisionEntregableSeeder::class,
            RevisionCriterioEntregableSeeder::class,
            PlanillaSeguimientoSeeder::class,
            RolSeeder::class,
            PersonaSeeder::class,
            UsersSeeder::class,
            ActividadSeeder::class,
            ObservacionSeeder::class,
            ArchivoSeeder::class,
        ]);
    }
}
