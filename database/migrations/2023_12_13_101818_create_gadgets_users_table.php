<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadgetsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('gadgets_users', function (Blueprint $table) {
            $table->id('id_gadget_link');
            $table->Biginteger('id_hero');
            $table->foreign('id_hero')->references('id_hero')->on('superheroes');
            $table->bigInteger('id_gadget');
            $table->foreign('id_gadget')->references('id_gadget')->on('gadgets');
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
        Schema::dropIfExists('gadgets_users');
    }
}
