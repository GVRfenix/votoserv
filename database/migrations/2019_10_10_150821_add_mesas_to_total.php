<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMesasToTotal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('total', function (Blueprint $table) {
			//$table ->foreign('partido')->references('partido_id')->on('partidos');
			$table ->foreign('mesas')->references('mesa_id')->on('mesas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('total', function (Blueprint $table) {
			$table->dropForeign(['mesas']);
		});
    }
}
