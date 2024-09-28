<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearAsignacionPlantillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AsignacionPlantilla', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorAsign')->references('identificador')->on('Asignacion');
            $table->foreignId('identificadorPlantEvaluFinal')->references('identificador')->on('PlantillaEvaluacionFinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AsignacionPlantilla');
    }
}
