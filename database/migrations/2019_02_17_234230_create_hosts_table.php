<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_type_id')->unsigned();
            $table->integer('departament_id')->unsigned()->nullable();
            $table->integer('user_host_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('mac_adress')->nullable();
            $table->integer('interno')->nullable();
            $table->string('ip_local')->nullable();
            $table->string('ssids')->nullable();
            $table->string('ssid_pass')->nullable();
            $table->string('ip_publica')->nullable();
            $table->string('class')->nullable();
            $table->integer('tcp')->nullable();
            $table->integer('udp')->nullable();
            $table->integer('http')->nullable();
            $table->integer('rtsp')->nullable();
            $table->integer('https')->nullable();
            $table->integer('tcp_ext')->nullable();
            $table->integer('udp_ext')->nullable();
            $table->integer('http_ext')->nullable();
            $table->integer('rtsp_ext')->nullable();
            $table->integer('https_ext')->nullable();
            $table->string('mascara')->nullable();
            $table->string('gateway')->nullable();
            $table->string('primarydns')->nullable();
            $table->string('secondarydns')->nullable();
            $table->integer('card_sim_i')->unsigned()->nullable();
            $table->integer('card_sim_ii')->unsigned()->nullable();
            $table->integer('card_sim_iii')->unsigned()->nullable();
            $table->integer('abonado_id')->unsigned()->nullable();
            $table->integer('cantzona')->nullable();
            $table->string('zona')->nullable();
            $table->string('p2p')->nullable();
            $table->string('acceso')->nullable();
            $table->integer('cctv_id')->unsigned()->nullable();
            $table->integer('modelo_id')->unsigned();
            $table->string('serial')->nullable();
            $table->string('afectado')->nullable();
            $table->integer('valor')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->string('comentario')->nullable();
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
        Schema::dropIfExists('hosts');
    }
}
