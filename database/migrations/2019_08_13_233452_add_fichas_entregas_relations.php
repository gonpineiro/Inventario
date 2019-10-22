<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFichasEntregasRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_entregas', function (Blueprint $table) {
            $table->foreign('departament_id')->references('id')->on('departaments');
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
          Schema::table('fichas_entregas', function (Blueprint $table) {
            $table->dropForeign('departaments_departament_id_foreign');
            $table->dropForeign('user_hosts_user_host_id_foreign');
          });
    }
}
