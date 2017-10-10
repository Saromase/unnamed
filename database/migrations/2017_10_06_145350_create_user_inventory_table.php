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
            $table->integer('Eau')->default(0);
            $table->integer('Pierre')->default(0);
            $table->integer('Gaz naturel')->default(0);
            $table->integer('Petrole')->default(0);
            $table->integer('Aluminium')->default(0);
            $table->integer('Or')->default(0);
            $table->integer('Cuivre')->default(0);
            $table->integer('Fer')->default(0);
            $table->integer('Sable')->default(0);
            $table->integer('Charbon')->default(0);
            $table->integer('Bois')->default(0);
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
