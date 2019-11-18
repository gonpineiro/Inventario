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
            $table->integer('departament_id')->unsigned();
            $table->integer('host_type_id')->unsigned();
            $table->string('name');
            $table->string('mac_adress')->nullable();
            $table->integer('interno')->nullable();
            $table->string('ip_local')->nullable();
            $table->string('ssids')->nullable();
            $table->string('ssid_pass')->nullable();
            $table->string('ip_publica')->nullable();
            $table->integer('tcp')->nullable();
            $table->integer('udp')->nullable();
            $table->integer('http')->nullable();
            $table->integer('rtsp')->nullable();
            $table->string('https')->nullable();
            $table->string('p2p')->nullable();
            $table->string('acceso')->nullable();
            $table->integer('cctv_id')->unsigned()->nullable();
            $table->integer('modelo_id')->unsigned();
            $table->string('serial')->nullable();
            $table->string('afectado')->nullable();
            $table->integer('valor')->nullable();
            $table->string('user_1')->nullable();
            $table->string('pass_1')->nullable();
            $table->string('user_2')->nullable();
            $table->string('pass_2')->nullable();
            $table->string('user_3')->nullable();
            $table->string('pass_3')->nullable();
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
