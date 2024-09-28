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
            $table->string('descripcion', 100);
            $table->date('fecha');
            $table->foreignId('identificadorPlaniSegui')->references('identificador')->on('PlanillaSeguimiento');
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
        Schema::dropIfExists('Observacion');
    }
}
