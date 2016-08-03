<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Impostos extends Migration
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
            $table->decimal('iss', 7,2);
            $table->decimal('ir', 7,2);
            $table->decimal('inss', 7,2);
            $table->decimal('pis', 7,2);
            $table->decimal('cofins', 7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faturamentos', function (Blueprint $table) {
            //
        });
    }
}
