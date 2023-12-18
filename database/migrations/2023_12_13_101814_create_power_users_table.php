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
            $table->id();
            $table->foreign('id_user')->references('id_hero')->on('superheroes');
            $table->bigInteger('id_power');
            $table->foreign('ids_power')->references('ids_power')->on('powers');
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
