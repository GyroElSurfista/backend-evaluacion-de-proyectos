<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionCriterioEntregableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RevisionCriterioEntregable', function (Blueprint $table) {
            $table->id('identificador');
            $table->boolean('cumple');
            $table->date('fecha');
            $table->string('observacion', 100)->nullable();
            $table->foreignId('identificadorCriteAceptEntre')->references('identificador')->on('CriterioAceptacionEntregable');
            $table->foreignId('identificadorEvaluObjet')->references('identificador')->on('EvaluacionObjetivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RevisionCriterioEntregable');
    }
}
