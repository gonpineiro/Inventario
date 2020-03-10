<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensekeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensekeys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->integer('host_id')->unsigned()->nullable();
            $table->string('fc');
            $table->string('type');
            $table->timestamp('fecha');
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
        Schema::dropIfExists('licensekey');
    }
}
