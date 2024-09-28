<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearUsuarioDiaRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuarioDiaRevision', function (Blueprint $table) {
            $table->id('identificador');
            $table->foreignId('identificadorUsuar')->references('id')->on('users');
            $table->foreignId('identificadorDiaRevis')->references('identificador')->on('DiaRevision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UsuarioDiaRevision');
    }
}
