<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHostCol2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('hosts', function (Blueprint $table) {
        $table->integer('tcp_ext')->nullable();
        $table->integer('udp_ext')->nullable();
        $table->integer('http_ext')->nullable();
        $table->integer('rtsp_ext')->nullable();
        $table->string('https_ext')->nullable();
        $table->integer('mascara')->nullable();
        $table->string('gateway')->nullable();
        $table->string('primarydns')->nullable();
        $table->string('secondarydns')->nullable();
        $table->integer('departament_id')->unsigned()->nullable()->change();
        $table->integer('card_sim_i')->unsigned()->nullable();
        $table->integer('card_sim_ii')->unsigned()->nullable();
        $table->integer('card_sim_iii')->unsigned()->nullable();
        $table->integer('abonado_id')->unsigned()->nullable();
        $table->integer('cantzona')->nullable();
        $table->string('zona')->nullable();
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
          $table->dropForeign('hosts_abonado_id_foreign');
      });
    }
}
