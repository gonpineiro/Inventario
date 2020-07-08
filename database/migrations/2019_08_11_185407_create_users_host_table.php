<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departament_id')->unsigned();
            $table->string('name');
            $table->string('apellido');
            $table->string('email');
            $table->timestamps();

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
        Schema::dropIfExists('users_host');
    }
}
