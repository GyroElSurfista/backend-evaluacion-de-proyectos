<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ActividadSeguimiento', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('nombre', 50);
            $table->foreignId('identificadorPlaniSegui')->references('identificador')->on('PlanillaSeguimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ActividadSeguimiento');
    }
}
