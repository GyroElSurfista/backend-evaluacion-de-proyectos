<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Objetivo', function (Blueprint $table) {
            $table->id('identificador');
            $table->date('fechaInici');
            $table->date('fechaFin');
            $table->decimal('valorPorce', 5, 2);
            $table->foreignId('identificadorPlani')->references('identificador')->on('Planificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Objetivo');
    }
}
