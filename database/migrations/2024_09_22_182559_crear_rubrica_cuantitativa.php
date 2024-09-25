<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearRubricaCuantitativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RubricaCuantitativa', function (Blueprint $table) {
            $table->id('identificadorRubriCuant');
            $table->integer('valorMaxim');
            $table->integer('valorMinim');
            $table->integer('cantidadInter');
            $table->foreignId('identifiadorRubri')->references('identificador')->on('Rubrica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RubricaCuantitativa');
    }
}
