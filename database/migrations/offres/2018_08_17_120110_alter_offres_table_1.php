<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterOffresTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offres', function(Blueprint $table)
        {
            $table->integer('city_id')->unsigned()->nullable()->index();
            $table->integer('city_id_to')->unsigned()->nullable()->index();
            $table->dropColumn('from_city_id');
            $table->dropColumn('to_city_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offres', function(Blueprint $table)
        {
            $table->dropColumn('city_id');
            $table->dropColumn('city_id_to');
            $table->integer('from_city_id')->unsigned()->nullable()->index();
            $table->integer('to_city_id')->unsigned()->nullable()->index();

        });
    }
}
