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
            $table->integer('line_phone')->nullable();
            $table->bigInteger('cod_sim')->nullable();
            $table->timestamps();
        });

        Schema::table('hosts', function (Blueprint $table) {
          $table->foreign('card_sim_i')->references('id')->on('card_sims');
          $table->foreign('card_sim_ii')->references('id')->on('card_sims');
          $table->foreign('card_sim_iii')->references('id')->on('card_sims');
        });

        Schema::table('card_sims', function (Blueprint $table) {
          $table->foreign('host_id')->references('id')->on('hosts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('hosts', function (Blueprint $table) {
            $table->dropForeign('hosts_sim_id_foreign');
        });
        Schema::dropIfExists('card_sims');
    }
}
