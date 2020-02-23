<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_city', function (Blueprint $table) {
            $table->increments('delivery_city_id');
            $table->integer('delivery_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->foreign("delivery_id")->references("id")->on("delivery_times");
            $table->foreign("city_id")->references("id")->on("cities");
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
        Schema::dropIfExists('delivery_times');
    }
}
