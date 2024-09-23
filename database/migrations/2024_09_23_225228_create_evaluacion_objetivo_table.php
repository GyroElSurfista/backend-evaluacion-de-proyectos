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
            $table->boolean('habilitadoPago');
            $table->boolean('sePago');
            $table->string('observacion', 100)->nullable();
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
        Schema::dropIfExists('EvaluacionObjetivo');
    }
}
