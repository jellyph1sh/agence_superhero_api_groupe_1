<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtectedCitiesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('protected_cities_groups', function (Blueprint $table) {
            $table->id('id_protected_cities_groups');
            $table->bigInteger('id_group');
            $table->foreign('id_group')->references('id_group')->on('groups')->onDelete('cascade');
            $table->bigInteger('id_city');
            $table->foreign('id_city')->references('id_city')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('protected_cities_groups');
    }
}