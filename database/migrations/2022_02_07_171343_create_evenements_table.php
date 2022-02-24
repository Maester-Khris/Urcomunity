<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membre_id')->unsigned();
            $table->string("titre");
            $table->string("qualificatif");
            $table->text("description");
            $table->integer("taux_cautisation");
            $table->boolean("statut");
            $table->date("date_acceptation")->nullable();
            $table->timestamps();
            $table->foreign('membre_id')->references('id')->on('membres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
}
