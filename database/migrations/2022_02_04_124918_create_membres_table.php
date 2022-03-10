<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zone_id')->unsigned();
            // $table->integer('role_id')->unsigned();
            $table->string("name");
            $table->string("matricule");
            $table->string("telephone");
            $table->boolean("deleguate");
            $table->boolean("statut");
            $table->date("registered_date");
            $table->timestamps();
            $table->foreign('zone_id')->references('id')->on('zones');
            // $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres');
    }
}
