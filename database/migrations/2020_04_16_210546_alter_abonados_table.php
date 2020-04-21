<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAbonadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //   Schema::table('abonados', function (Blueprint $table) {
    //       //$table->dropForeign('abonados_cliente_id_foreign');
    //       //$table->dropForeign('abonados_plataforma_id_foreign');
    //       $table->dropColumn('cliente_id');
    //       $table->dropColumn('type');
    //
    //       $table->integer('departament_id')->unsigned();
    //       $table->integer('abonadotype_id')->unsigned();
    //       $table->integer('plataforma_id')->unsigned();
    //       $table->string('telefono')->nullable();
    //       $table->string('palabra_clave');
    //       // $table->foreign('departament_id')->references('id')->on('departaments');
    //       //$table->foreign('plataforma_id')->references('id')->on('plataformas');
    //   });
    //
    //   Schema::table('abonados', function (Blueprint $table) {
    //       //$table->foreign('type_id')->references('id')->on('abonadotypes');
    //   });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
