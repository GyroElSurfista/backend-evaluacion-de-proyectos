<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolFuncionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RolFuncion', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorRol')->references('identificador')->on('Rol');
            $table->foreignId('identificadorFunci')->references('identificador')->on('Funcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RolFuncion');
    }
}
