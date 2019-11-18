<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHostsRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('hosts', function (Blueprint $table) {
          $table->foreign('departament_id')->references('id')->on('departaments');
          $table->foreign('host_type_id')->references('id')->on('host_types');
          $table->foreign('modelo_id')->references('id')->on('modelos');
          $table->foreign('cctv_id')->references('id')->on('hosts');
          $table->foreign('estado_id')->references('id')->on('estados');
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
          $table->dropForeign('hosts_departament_id_foreign');
          $table->dropForeign('hosts_host_type_id_foreign');
          $table->dropForeign('hosts_modelo_id_foreign');
          $table->dropForeign('hosts_cctv_id_foreign');
          $table->dropForeign('hosts_estado_id_foreign');
      });
    }
}
