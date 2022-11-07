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
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->integer('zone_id')->nullable()->unsigned();
            $table->integer('village_id')->unsigned();
            $table->string("name");
            $table->string("matricule");
            $table->string("telephone");
            $table->boolean("deleguate");
            $table->boolean("statut");
            $table->string("numero_cni");
            $table->integer('partcipation_heureuse')->default(0);
            $table->integer('partcipation_malheureuse')->default(0);
            $table->string("url_photo")->nullable();
            $table->date("registered_date");
            $table->integer('penalites')->default(0);
            $table->timestamps();
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->foreign('village_id')->references('id')->on('villages');
        });

        Schema::table('membres', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
