<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Actividad', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('nombre', 50);
            $table->string('descripcion', 255)->nullable();
            $table->date('fechaInici');
            $table->date('fechaFin');
            $table->foreignId('identificadorUsua')->references('id')->on('users');
            $table->foreignId('identificadorObjet')->references('identificador')->on('Objetivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Actividad');
    }
}
