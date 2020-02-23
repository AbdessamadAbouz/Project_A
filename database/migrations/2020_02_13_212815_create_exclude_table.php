<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcludeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclude', function (Blueprint $table) {
            $table->increments('exclude_id');
            $table->date('start_day');
            $table->date('end_day');
            $table->string('delivery_id')->nullable();
            $table->integer('city_id')->unsigned();
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
