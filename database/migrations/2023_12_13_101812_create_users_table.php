<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('alias');
            $table->string('mail');
            $table->string('password');
            $table->string('role');
            $table->string('profile_picture');
        });

        // Ajoute la clé étrangère avec suppression en cascade
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_hero')->on('superheroes')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
