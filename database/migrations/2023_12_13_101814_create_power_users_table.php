<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('power_users', function (Blueprint $table) {
            $table->id('id_hero');
            $table->foreign('id_hero')->references('id_hero')->on('superheroes');
            $table->bigInteger('id_power');
            $table->foreign('id_power')->references('id_power')->on('powers');
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
        Schema::dropIfExists('power_users');
    }
}
