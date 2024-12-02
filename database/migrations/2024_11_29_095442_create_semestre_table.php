<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Semestre', function (Blueprint $table) {
            $table->id('identificador');
            $table->date('fechaPlaniInici');
            $table->date('fechaPlaniRevis');
            $table->date('fechaPlaniFin');
            $table->date('fechaDesaInici');
            $table->date('fechaDesaFin');
            $table->date('fechaEvaluInici');
            $table->date('fechaEvaluFin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Semestre');
    }
}
