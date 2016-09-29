<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogdeusUsuarioReembolso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reembolsos', function (Blueprint $table) {
            $table->string('criador');
            $table->string('atualizador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reembolsos', function (Blueprint $table) {
            $table->dropColumn(array('criador', 'atualizador'));
        });
    }
}
