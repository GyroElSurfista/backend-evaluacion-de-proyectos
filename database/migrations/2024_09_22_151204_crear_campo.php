<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearCampo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Campo', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('nombre', 40);
            $table->integer('orden');
            $table->foreignId('identificadorRubriCuali')->references('identificadorRubriCuali')->on('RubricaCualitativa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Campo');
    }
}
