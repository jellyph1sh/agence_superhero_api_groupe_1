<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('superheroes', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_hero')->references('sidekick')->on('superheroes');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('alias');
            $table->string('sex');
            $table->string('hair_color');
            $table->string('description');
            $table->bigInteger('sidekick');
            $table->string('wiki_url');
            $table->bigInteger('id_group');
            $table->foreign('id_group')->references('id_group')->on('groups');
            $table->string('origin_planet');
            $table->bigInteger('id_creator');
            $table->foreign('id_creator')->references('id_user')->on('users');
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
        Schema::dropIfExists('superheroes');
    }
}
