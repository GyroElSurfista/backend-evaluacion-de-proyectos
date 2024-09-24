<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('identificadorPerso')->references('identificador')->on('Persona');
            $table->foreignId('identificadorGrupoEmpre')->references('identificador')->on('GrupoEmpresa');
            $table->foreignId('identificadorRol')->references('identificador')->on('Rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['identificadorPerso']);
            $table->dropForeign(['identificadorGrupoEmpre']);
            $table->dropForeign(['identificadorRol']);
        });
    }
}
