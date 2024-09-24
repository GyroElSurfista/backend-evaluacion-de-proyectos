<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPlantillaEvaluacionFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlantillaEvaluacionFinal', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('descripcion', 100)->nullable();
            $table->date('fechaCreac');
            $table->foreignId('identificadorTipoEvaluFinal')->references('identificador')->on('TipoEvaluacionFinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PlantillaEvaluacionFinal');
    }
}
