<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asignacion', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorUsuarEvalu')->nullable()->references('id')->on('users');
            $table->foreignId('identificadorUsuarEsEvalu')->nullable()->references('id')->on('users');
            $table->foreignId('identificadorGrupoEmpreEvalu')->nullable()->references('identificador')->on('GrupoEmpresa');
            $table->foreignId('identificadorGrupoEmpreEsEvalu')->nullable()->references('identificador')->on('GrupoEmpresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Asignacion');
    }
}
