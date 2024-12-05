<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGrupoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('GrupoEmpresa', function (Blueprint $table) {
            $table->foreignId('identificadorSemes')->references('identificador')->on('Semestre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('GrupoEmpresa', function (Blueprint $table) {
            $table->dropColumn('identificadorSemes');
        });
    }
}
