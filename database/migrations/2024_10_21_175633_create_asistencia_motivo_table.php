<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaMotivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AsistenciaMotivo', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorAsist')->references('identificador')->on('Asistencia');
            $table->foreignId('identificadorMotiv')->references('identificador')->on('Motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AsistenciaMotivo');
    }
}
