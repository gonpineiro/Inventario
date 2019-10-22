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
            $table->integer('cliente_id')->unsigned();
            $table->string('type')->nullable();
            $table->string('email')->nullable();

            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
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
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
            $table->dropForeign('abonados_cliente_id_foreign');
        });
        Schema::dropIfExists('abonados');
    }
}
