<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearRubricaCualitativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RubricaCualitativa', function (Blueprint $table) {
            $table->id('identificadorRubriCuali');
            $table->foreignId('identificadorRubri')->references('identificador')->on('Rubrica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RubricaCualitativa');
    }
}
