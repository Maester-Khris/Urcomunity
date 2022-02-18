<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantcollectesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantcollectes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membre_id')->unsigned();
            $table->integer('collecte_id')->unsigned();
            $table->timestamps();
            $table->foreign('membre_id')->references('id')->on('membres');
            $table->foreign('collecte_id')->references('id')->on('collectefonds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantcollectes');
    }
}
