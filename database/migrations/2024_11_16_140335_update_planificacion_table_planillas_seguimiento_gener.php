<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePlanificacionTablePlanillasSeguimientoGener extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Planificacion', function (Blueprint $table) {
            $table->boolean('planillasSeguiGener')->default(false);
            $table->date('fechaPlaniSeguiGener')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Planificacion', function (Blueprint $table) {
            $table->dropColumn('planillasSeguiGener');
        });
    }
}
