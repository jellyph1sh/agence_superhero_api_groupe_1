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
            $table->bigInteger('id_group');
            $table->foreign('id_group')->references('id_group')->on('groups');
            $table->bigInteger('id_city');
            $table->foreign('id_city')->references('id_city')->on('cities');
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
