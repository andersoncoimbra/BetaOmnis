<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacaoFaturamentocomJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faturamentos', function (Blueprint $table) {
            //
            $table->integer('job_id')->unsigned()->nullable;

            $table->foreign('job_id')->references('id')->on('jobs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faturamentos', function (Blueprint $table)
        {
            $table->dropForeign('faturamentos_job_id_foreign');
        });
    }
}
