<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectefondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectefonds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evenement_id')->unsigned();
            $table->date('date_lancement');
            $table->integer('delai_envoi_participation');
            $table->integer('montant_cotisation');
            $table->string('statut');
            $table->timestamps();
            $table->foreign('evenement_id')->references('id')->on('evenements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collectefonds');
    }
}
