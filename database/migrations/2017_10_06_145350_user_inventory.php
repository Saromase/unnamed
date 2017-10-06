<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('water');
            $table->integer('rock');
            $table->integer('natural_gas');
            $table->integer('crud_oil');
            $table->integer('aluminium');
            $table->integer('gold');
            $table->integer('iron');
            $table->integer('copper');
            $table->integer('sand');
            $table->integer('charcoal');
            $table->integer('wood');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
