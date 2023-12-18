<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_city')->unsigned(); // Assuming 'hq_city' is a bigInteger in the 'groups' table
            $table->foreign('id_city')->references('id')->on('groups'); // Assuming 'id' is the primary key in the 'groups' table
            $table->string('city_name');
            $table->float('latitude');
            $table->float('longitude');
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
        Schema::dropIfExists('cities');
    }
}
