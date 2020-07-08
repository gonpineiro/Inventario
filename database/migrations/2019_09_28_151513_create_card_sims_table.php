<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_sims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id')->unsigned()->nullable();
            $table->integer('sim_deposito_id')->unsigned();
            $table->integer('line_phone')->nullable();
            $table->bigInteger('cod_sim')->nullable();

            $table->timestamps();

            $table->foreign('sim_deposito_id')->references('id')->on('sim_depositos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_sims');
    }
}
