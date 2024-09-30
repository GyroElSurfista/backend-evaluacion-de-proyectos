<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Planificacion', function (Blueprint $table) {
            $table->id('identificador');
            $table->date('fechaInici');
            $table->date('fechaFin');
            $table->decimal('costo', 9, 4);
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
        Schema::dropIfExists('Planificacion');
    }
}
