<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_entregas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departament_id')->unsigned()->nullable();
            $table->integer('user_host_id')->unsigned();
            $table->string('name');
            $table->timestamp('fecha');
            $table->integer('type')->unsigned();
            $table->json('detalle',50);
            $table->timestamps();

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
        Schema::dropIfExists('fichas_entregas');
    }
}
