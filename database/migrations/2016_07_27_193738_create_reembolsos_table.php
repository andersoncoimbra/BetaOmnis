<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reembolsos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parceiro', 20);
            $table->string('job', 100);
            $table->decimal('valor', 5,2);
            $table->dateTime('data');
            $table->string('fornecedor');
            $table->string('identificador');
            $table->dateTime('data_envio');
            $table->string('obs');
            $table->decimal('recibo', 5,2);
            $table->dateTime('data_pagamento');
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
        Schema::drop('reembolsos');
    }
}
