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
            $table->id();
            $table->bigInteger('id_gadget')->unsigned(); // Assuming 'id_gadget' is a bigInteger in the 'gadgets_users' table
            $table->foreign('id_gadget')->references('id_gadget')->on('gadgets_users');
            $table->string('gadget_name');
            $table->string('gadget_description');
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
