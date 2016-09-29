<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VagasjobsCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagasjobs_candidatos', function (Blueprint $table) {
            $table->integer('vagasjobs_id')->unsigned();
            $table->integer('candidatos_id')->unsigned();
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
        Schema::drop('vagasjobs_candidatos');

    }
}
