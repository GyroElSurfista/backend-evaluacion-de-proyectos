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
            $table->string('nombre', 40);
            $table->string('descripcion', 100);
            $table->date('fechaLlena');
            $table->foreignId('identificadorPlaniSegui')->references('identificador')->on('PlanillaSeguimiento');
            $table->foreignId('identificadorActiv')->references('identificador')->on('Actividad');
            $table->timestamps();
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
