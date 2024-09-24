<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillaSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlanillaSeguimiento', function (Blueprint $table) {
            $table->id('identificador');
            $table->date('fecha');
            $table->string('observacion', 100);
            $table->foreignId('identificadorObjet')->nullable()->constrained('Objetivo')->onDelete('set null');
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
        Schema::dropIfExists('PlanillaSeguimiento');
    }
}
