<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInventoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(0);
            $table->integer('water')->default(0);
            $table->integer('rock')->default(0);
            $table->integer('natural_gas')->default(0);
            $table->integer('crud_oil')->default(0);
            $table->integer('aluminium')->default(0);
            $table->integer('gold')->default(0);
            $table->integer('iron')->default(0);
            $table->integer('copper')->default(0);
            $table->integer('sand')->default(0);
            $table->integer('charcoal')->default(0);
            $table->integer('wood')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
