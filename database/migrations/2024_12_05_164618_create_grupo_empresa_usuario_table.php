<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoEmpresaUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GrupoEmpresaUsuario', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorGrupoEmpre')->references('identificador')->on('GrupoEmpresa');
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
        Schema::dropIfExists('GrupoEmpresaUsuario');
    }
}
