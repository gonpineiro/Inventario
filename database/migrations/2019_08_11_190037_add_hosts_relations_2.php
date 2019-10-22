<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHostsRelations2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('hosts', function (Blueprint $table) {
          $table->foreign('user_host_id')->references('id')->on('user_hosts');
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
          $table->dropForeign('hosts_user_host_id_id_foreign');
      });
    }
}
