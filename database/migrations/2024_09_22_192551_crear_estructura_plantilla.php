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
            $table->integer('valorMaxim');
            $table->foreignId('identificadorPlantEvaluFinal')->references('identificador')->on('PlantillaEvaluacionFinal')->onDelete('cascade');
            $table->foreignId('identificadorParamEvalu')->nullable()->references('identificador')->on('ParametroEvaluacion');
            $table->foreignId('identificadorCriteEvaluFinal')->nullable()->references('identificador')->on('CriterioEvaluacionFinal');
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
