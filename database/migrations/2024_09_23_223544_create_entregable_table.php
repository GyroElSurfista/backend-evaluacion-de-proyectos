<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Entregable', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('nombre', 40);
            $table->string('descripcion', 100)->nullable();
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
        Schema::dropIfExists('Entregable');
    }
}
