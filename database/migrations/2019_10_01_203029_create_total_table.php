<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total', function (Blueprint $table) {
            $table->increments('total_id');
            //$table->integer('total_presidente');
            //$table->integer('total_uninominal');
            //$table->integer('total_alcalde');
            //$table->integer('total_gobernador');
            $table->timestamp('total_fec_reg');
			$table->integer('mesas');
			$table->string ('obs_suma_voto');
			$table->string ('observaciones');
			$table->integer('presi_cc');
			$table->integer('presi_ucs');
			$table->integer('presi_pdc');
			$table->integer('presi_fpv');
			$table->integer('presi_mas');
			$table->integer('presi_mnr');
			$table->integer('presi_mts');
			$table->integer('presi_bdn');
			$table->integer('presi_pan');
			$table->integer('presi_nulo');
			$table->integer('presi_blan');
			$table->integer('unino_cc');
			$table->integer('unino_ucs');
			$table->integer('unino_pdc');
			$table->integer('unino_fpv');
			$table->integer('unino_mas');
			$table->integer('unino_mnr');
			$table->integer('unino_mts');
			$table->integer('unino_bdn');
			$table->integer('unino_pan');
			$table->integer('unino_nulo');
			$table->integer('unino_blan');
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
        Schema::dropIfExists('total');
    }
}
