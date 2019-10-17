<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecintoToMesas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('mesas', function (Blueprint $table) {
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
		$table->dropForeign(['recinto']);
    }
}
