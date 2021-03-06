<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 14/10/2017
 * Time: 20:38
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseContent extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        $connection = config('database.default');

        Schema::connection($connection)->create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->engine = 'InnoDB';
        });

        Schema::connection($connection)->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('percentage');
            $table->integer('median_price');
            $table->integer('price');
            $table->integer('regeneration');
            $table->integer('supply_demand');
            $table->string('color');
            $table->integer('tier');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::connection($connection)->create('storage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('length');
            $table->integer('price');

            $table->engine = 'InnoDB';
        });

        Schema::connection($connection)->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('money');
            $table->integer('inventory_size');
            $table->integer('storage_id')->unsigned();
            $table->foreign('storage_id')->references('id')->on('storage');

            $table->engine = 'InnoDB';
        });

        Schema::connection($connection)->create('user_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('buy_price');
            $table->integer('quantity');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
        
        Schema::connection($connection)->create('factory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::connection($connection)->create('user_factory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('factory_id')->unsigned();
            $table->foreign('factory_id')->references('id')->on('factory')->onDelete('cascade');
            $table->integer('level');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('products');
        Schema::dropIfExists('storage');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_inventory');
    }
}
