<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asistencia', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorUsuar')->references('id')->on('users');
            $table->date('fecha')->nullable(false);
            $table->boolean('valor')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Asistencia');
    }
}
