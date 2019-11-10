<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HostMovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_movs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('host_id')->unsigned();
          $table->integer('user_host_id')->unsigned();
          $table->integer('ficha_entrega_id')->unsigned();
          $table->integer('type')->unsigned();
          $table->timestamps();
        });


        Schema::table('host_movs', function (Blueprint $table) {
            $table->foreign('host_id')->references('id')->on('hosts');
            $table->foreign('user_host_id')->references('id')->on('user_hosts');
            $table->foreign('ficha_entrega_id')->references('id')->on('fichas_entregas');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('host_movs', function (Blueprint $table) {
          $table->dropForeign('host_movs_host_id_foreign');
          $table->dropForeign('host_movs_user_host_id_foreign');
          $table->dropForeign('host_movs_ficha_entrega_id_foreign');
      });
        Schema::dropIfExists('host_movs');
    }
}
