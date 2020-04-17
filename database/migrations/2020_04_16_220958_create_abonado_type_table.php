<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonadoTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonadotypes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name');
            $table->timestamps();
        });

        Schema::table('abonados', function (Blueprint $table) {
            $table->foreign('abonadotype_id')->references('id')->on('abonadotypes');
            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->foreign('plataforma_id')->references('id')->on('plataformas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonado_type');
    }
}
