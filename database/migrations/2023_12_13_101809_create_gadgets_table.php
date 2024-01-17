<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('gadgets', function (Blueprint $table) {
            $table->id('id_gadget');
            $table->string('gadget_name');
            $table->string('gadget_description');

            // Ajoute la clé étrangère avec suppression en cascade
            $table->foreign('id_gadget')
                ->references('id_hero')
                ->on('superheroes')
                ->onDelete('cascade');
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
        Schema::dropIfExists('gadgets');
    }
}
