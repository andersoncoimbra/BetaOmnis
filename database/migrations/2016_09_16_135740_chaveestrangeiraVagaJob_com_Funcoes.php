<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChaveestrangeiraVagaJobComFuncoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vagas_jobs', function (Blueprint $table) {
            //
            $table->foreign('cargo')->references('id')->on('funcoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vagas_jobs', function (Blueprint $table) {
            //
            $table->dropForeign('vagas_jobs_cargo_foreign');
        });
    }
}
