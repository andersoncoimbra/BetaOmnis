<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasVagasJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras_vagas_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo')->unsigned();
            $table->integer('quantidade')->unsigned();
            $table->integer('periodo')->unsigned();
            $table->decimal('valor', 7,2);
            $table->decimal('custo', 7,2);
            $table->integer('id_vaga_job');
            $table->foreign('id_vaga_job')->references('id')->on('vaga_jobs')->onDelete('cascade');
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
        Schema::drop('extras_vagas_jobs');
    }
}
