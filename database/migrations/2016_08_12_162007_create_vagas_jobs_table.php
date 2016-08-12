<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cargo')->unsigned();
            $table->integer('regime')->unsigned();
            $table->integer('contratante')->unsigned();
            $table->integer('quantidade')->unsigned();
            $table->integer('periodo')->unsigned();
            $table->decimal('valor', 7, 2);
            $table->decimal('custo',7,2);
            $table->integer('id_job')->unsigned();
            $table->foreign('id_job')->references('id')->on('jobs')->onDelete('cascade');
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
        Schema::drop('vagas_jobs');
    }
}
