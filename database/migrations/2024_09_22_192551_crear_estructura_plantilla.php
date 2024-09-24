<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEstructuraPlantilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EstructuraPlantilla', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorPlantEvaluFinal')->references('identificador')->on('PlantillaEvaluacionFinal');
            $table->foreignId('identificadorRubri')->references('identificador')->on('Rubrica');
            $table->foreignId('identificadorCriteEvaluFinal')->references('identificador')->on('CriterioEvaluacionFinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EstructuraPlantilla');
    }
}
