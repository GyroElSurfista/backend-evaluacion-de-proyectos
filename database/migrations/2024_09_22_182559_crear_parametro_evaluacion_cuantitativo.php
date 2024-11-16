<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearParametroEvaluacionCuantitativo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ParametroEvaluacionCuantitativo', function (Blueprint $table) {
            $table->id('identificadorParamEvaluCuant');
            $table->integer('valorMaxim');
            $table->integer('valorMinim');
            $table->integer('cantidadInter');
            $table->foreignId('identificadorParamEvalu')->references('identificador')->on('ParametroEvaluacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ParametroEvaluacionCuantitativo');
    }
}
