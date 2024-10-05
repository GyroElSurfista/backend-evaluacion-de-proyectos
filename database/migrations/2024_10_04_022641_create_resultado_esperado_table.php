<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoEsperadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ResultadoEsperado', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('descripcion', 256);
            $table->foreignId('identificadorActiv')->references('identificador')->on('Actividad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ResultadoEsperado');
    }
}
