<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('vehicules_users', function (Blueprint $table) {
            $table->id('id_hero');
            $table->foreign('id_hero')->references('id_hero')->on('superheroes');
            $table->bigInteger('id_vehicule');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules_users');
    }
}
