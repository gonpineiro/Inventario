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
            $table->string('name');
            $table->integer('host_type_id')->unsigned();
            $table->integer('departament_id')->unsigned()->nullable();
            $table->integer('user_host_id')->unsigned()->nullable();
            $table->integer('estado_id')->unsigned();
            $table->integer('abonado_id')->unsigned()->nullable();
            $table->integer('cctv_id')->unsigned()->nullable();
            $table->integer('modelo_id')->unsigned();
            $table->string('os_cred')->nullable();
            $table->integer('interno')->nullable();
            $table->string('mac_adress')->nullable();
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
            $table->integer('cantzona')->nullable();
            $table->string('zona')->nullable();
            $table->string('p2p')->nullable();
            $table->string('acceso')->nullable();
            $table->string('serial')->nullable();
            $table->string('afectado')->nullable();
            $table->integer('valor')->nullable();
            $table->string('comentario')->nullable();
            $table->timestamps();


            // Relaciones
            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->foreign('host_type_id')->references('id')->on('host_types');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->foreign('cctv_id')->references('id')->on('hosts');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('user_host_id')->references('id')->on('user_hosts');
            $table->foreign('abonado_id')->references('id')->on('abonados');

            $table->foreign('card_sim_i')->references('id')->on('card_sims');
            $table->foreign('card_sim_ii')->references('id')->on('card_sims');
            $table->foreign('card_sim_iii')->references('id')->on('card_sims');
        });

        Schema::table('host_works', function (Blueprint $table) {
            $table->foreign('host_id')->references('id')->on('hosts');
        });
            
        Schema::table('card_sims', function (Blueprint $table) {
            $table->foreign('host_id')->references('id')->on('hosts');
        });

        Schema::table('credentials', function (Blueprint $table) {
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
        Schema::table('host_works', function (Blueprint $table) {
            $table->dropForeign('host_works_host_id_foreign');
        });
            
        Schema::table('card_sims', function (Blueprint $table) {
            $table->dropForeign('card_sims_host_id_foreign');
        });

        Schema::table('credentials', function (Blueprint $table) {
            $table->dropForeign('credentials_host_id_foreign');
        });

        Schema::dropIfExists('hosts');
    }
}
