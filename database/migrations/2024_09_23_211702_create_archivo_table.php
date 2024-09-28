<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Archivo', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('ruta', 100);
            $table->date('fechaSubid');
            $table->foreignId('identificadorGrupoEmpre')->references('identificador')->on('GrupoEmpresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Archivo');
    }
}
