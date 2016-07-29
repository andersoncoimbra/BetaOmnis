<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parceiro', 50);
            $table->string('job', 50);
            $table->decimal('valor', 5,2);
            $table->string('nf', 50)->nullable();
            $table->decimal('valorfaturado', 5,2)->nullable();
            $table->dateTime('datafaturamento')->nullable();
            $table->decimal('valorrecebido', 5,2)->nullable();
            $table->dateTime('datapagamento')->nullable();
            $table->string('status',12)->nullable();
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
        Schema::drop('faturamentos');
    }
}
