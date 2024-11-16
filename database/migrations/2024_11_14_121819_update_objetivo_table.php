<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateObjetivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Objetivo', function (Blueprint $table) {
            $table->date('fechaEvaluFinalGener')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Objetivo', function (Blueprint $table) {
            $table->dropColumn('fechaEvaluFinalGener');
        });
    }
}
