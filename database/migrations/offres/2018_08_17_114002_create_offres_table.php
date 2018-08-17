<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('price')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('from_city_id')->unsigned()->nullable()->index();
            $table->integer('to_city_id')->unsigned()->nullable()->index();
            $table->integer('shop_id')->unsigned()->nullable()->index();
            $table->integer('user_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offres');
    }
}
