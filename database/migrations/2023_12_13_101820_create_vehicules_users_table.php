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
            $table->id();
            $table->bigInteger('user_id')->unsigned(); // Assuming 'id_user' is a bigInteger in the 'superheroes' table
            $table->foreign('user_id')->references('id_user')->on('superheroes');
            $table->bigInteger('vehicule_id')->unsigned(); // Assuming 'id_vehicule' is a bigInteger in the 'vehicules' table
            $table->foreign('vehicule_id')->references('id_vehicule')->on('vehicules');
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
