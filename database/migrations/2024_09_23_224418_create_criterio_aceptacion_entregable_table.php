<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriterioAceptacionEntregableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CriterioAceptacionEntregable', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('descripcion', 100);
            $table->foreignId('identificadorEntre')->references('identificador')->on('Entregable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CriterioAceptacionEntregable');
    }
}
