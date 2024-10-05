<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionInterfazUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FuncionInterfazUsuario', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorFunci')->references('identificador')->on('Funcion');
            $table->foreignId('identificadorInter')->references('identificador')->on('InterfazUsuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FuncionInterfazUsuario');
    }
}
