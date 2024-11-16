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
            $table->string('nombre', 50);
            $table->string('descripcion', 256)->nullable(true);
            $table->integer('puntaje');
            $table->date('fechaCreac');
            $table->boolean('eliminadoLogic')->default(false);
            $table->foreignId('identificadorUsuar')->references('id')->on('users');
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
