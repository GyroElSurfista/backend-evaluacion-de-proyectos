<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionEntregableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RevisionEntregable', function (Blueprint $table) {
            $table->id('identificador');
            $table->boolean('cumple');
            $table->date('fecha');
            $table->string('observacion', 100)->nullable();
            $table->foreignId('identificadorEntre')->references('identificador')->on('Entregable');
            $table->foreignId('identificadorEvaluObjet')->references('identificador')->on('EvaluacionObjetivo');
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
        Schema::dropIfExists('RevisionEntregable');
    }
}
