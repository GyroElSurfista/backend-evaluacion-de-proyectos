<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestreUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SemestreUsuario', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorSemes')->references('identificador')->on('Semestre');
            $table->foreignId('identificadorUsuar')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SemestreUsuario');
    }
}
