<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlataformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plataformas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            $table->timestamps();
        });

        Schema::table('abonados', function (Blueprint $table) {
            //$table->foreign('departament_id')->references('id')->on('departaments');
            //$table->foreign('plataforma_id')->references('id')->on('plataformas');
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

        Schema::dropIfExists('plataformas');
    }
}
