<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecintoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recinto', function (Blueprint $table) {
            $table->increments('recinto_id');
            $table->string('recinto_provincia', 30);
            $table->string('recinto_municipio', 30);
            $table->string('recinto_asiento_elec', 30);
            $table->string('recinto_nombre', 40);
            $table->string('recinto_circ', 5);
            $table->integer('recinto_nmesas');
            $table->integer('recinto_habilitados');
            $table->string('recinto_gestion', 4);
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
        Schema::dropIfExists('recinto');
    }
}
