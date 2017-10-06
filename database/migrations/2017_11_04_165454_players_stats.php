<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayersStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('user_storage')->unsigned();
            $table->integer('user_inventory')->unsigned();
            $table->integer('life');
            $table->integer('money');
            $table->integer('max_inventory');
            $table->engine = 'InnoDB';
        });
        Schema::table('player_stats', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_storage')->references('id')->on('storage');
            $table->foreign('user_inventory')->references('id')->on('inventory');
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_stats');
    }
}
