<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordAbonadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_abonados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('abonado_id')->unsigned();
            $table->string('particion');
            $table->string('password');

            $table->timestamps();
        });
        Schema::table('password_abonados', function (Blueprint $table) {
            $table->foreign('abonado_id')->references('id')->on('abonados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_abonados');
    }
}
