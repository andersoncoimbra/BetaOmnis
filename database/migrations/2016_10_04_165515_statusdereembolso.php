<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Statusdereembolso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reembolsos', function (Blueprint $table) {

            $table->string('status', 20);
            //
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
            //
            $table->dropColumn('status');
        });
    }
}
