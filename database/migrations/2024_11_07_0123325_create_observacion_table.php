<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Observacion', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('descripcion', 256);
            $table->date('fecha');
            $table->foreignId('identificadorActivSegui')->references('identificador')->on('ActividadSeguimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Observacion');
    }
}
