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
            $table->string('name');
            $table->timestamp('fecha');
            $table->integer('departament_id')->unsigned();
            $table->integer('user_host_id')->unsigned();
            $table->json('detalle');
            $table->timestamps();
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
