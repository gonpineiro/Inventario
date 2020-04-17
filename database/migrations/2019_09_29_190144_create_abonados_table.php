<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departament_id')->unsigned();
            $table->integer('plataforma_id')->unsigned();
            $table->integer('abonadotype_id')->unsigned();
            $table->string('palabra_clave', 25)->nullable();
            $table->string('email')->nullable();
            $table->string('numero')->nullable();
            $table->string('palabra_clave');

            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('partido')->nullable();
            $table->string('provincia')->nullable();
            $table->integer('cp')->nullable();

            $table->string('comentario')->nullable();
            $table->timestamps();
        });

        Schema::table('hosts', function (Blueprint $table) {
          $table->foreign('abonado_id')->references('id')->on('abonados');
        });
        Schema::table('abonados', function (Blueprint $table) {
            $table->foreign('departament_id')->references('id')->on('departaments');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abonados', function (Blueprint $table) {
            $table->dropForeign('abonados_departament_id_foreign');
            $table->dropForeign('abonados_plataforma_id_foreign');
        });
        Schema::dropIfExists('abonados');
    }
}
