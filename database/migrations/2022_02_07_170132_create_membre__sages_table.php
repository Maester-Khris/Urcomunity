<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembreSagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membre__sages', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('membre_id')->unsigned();
           $table->string("fonction");
           $table->timestamps();
           $table->foreign('membre_id')->references('id')->on('membres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membre__sages');
    }
}
