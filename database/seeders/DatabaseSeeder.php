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
            SemestreSeeder::class,
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
            ActividadSeguimientoSeeder::class,
            ObservacionSeeder::class,
            ArchivoSeeder::class,
            ResultadoEsperadoSeeder::class,
            UsuarioRolSeeder::class,
            FuncionSeeder::class,
            RolFuncionSeeder::class,
            InterfazUsuarioSeeder::class,
            FuncionInterfazUsuarioSeeder::class,
            Motivo::class,
            CriterioEvaluacionFinalSeeder::class,
            ParametroEvaluacionSeeder::class,
            ParametroEvaluacionCualitativoSeeder::class,
            ParametroEvaluacionCuantitativoSeeder::class,
            CampoSeeder::class,
            AsistenciaSeeder::class,
            PlantillaEvaluacionFinalSeeder::class,
            EstructuraPlantillaSeeder::class,
            GrupoEmpresaUsuarioSeeder::class,
        ]);
    }
}
