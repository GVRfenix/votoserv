<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartidosIdToTotal extends Migration
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
			$table ->foreign('recinto')->references('recinto_id')->on('recinto');
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
           // $table->dropForeign(['partido']);
            $table->dropForeign(['recinto']);
        });
    }
}
