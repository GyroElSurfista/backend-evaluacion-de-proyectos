<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Actividad', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('nombre', 40);
            $table->string('descripcion', 100)->nullable();
            $table->date('fechaInici');
            $table->date('fechaFin');
            $table->foreignId('identificadorUsua')->nullable()->constrained('Usuario')->onDelete('set null');
            $table->foreignId('identificadorObjet')->constrained('Objetivo')->onDelete('cascade');
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
        Schema::dropIfExists('Actividad');
    }
}
