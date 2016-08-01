<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaFaturamento extends Migration
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
            $table->dateTime('data')->nullable();
            $table->decimal('valorliquido', 5,2)->nullable();
            $table->string('lastuser', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faturamento', function (Blueprint $table) {
            //
        });
    }
}
