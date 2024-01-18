<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('groups', function (Blueprint $table) {
            $table->id('id_group');
            $table->string('group_names');
            $table->bigInteger('id_chief');
            $table->foreign('id_chief')->references('id_hero')->on('superheroes')->onDelete('cascade');
            $table->bigInteger('hq_city');
            $table->foreign('hq_city')->references('id_city')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('groups');
    }
}