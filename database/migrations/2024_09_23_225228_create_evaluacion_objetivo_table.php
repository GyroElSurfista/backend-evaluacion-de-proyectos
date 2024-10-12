<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionObjetivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EvaluacionObjetivo', function (Blueprint $table) {
            $table->id('identificador');
            $table->date('fecha');
            $table->boolean('habilitadoPago')->default(false);
            $table->boolean('sePago')->default(false);
            $table->string('observacion', 100)->nullable();
            $table->foreignId('identificadorObjet')->references('identificador')->on('Objetivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EvaluacionObjetivo');
    }
}
