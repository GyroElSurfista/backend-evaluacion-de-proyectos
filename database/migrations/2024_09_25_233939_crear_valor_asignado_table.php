<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearValorAsignadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ValorAsignado', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorAsign')->references('identificador')->on('Asignacion');
            $table->foreignId('identificadorEstruPlant')->references('identificador')->on('EstructuraPlantilla');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ValorAsignado');
    }
}
