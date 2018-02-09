<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyAverage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('daily_averages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reporter')->nullable();
            $table->string('acc')->nullable();
            $table->string('pressure')->nullable();
            $table->string('soiltemp')->nullable();
            $table->string('temperature')->nullable();
            $table->string('moisture')->nullable();
            $table->string('lux')->nullable();
            $table->string('heading')->nullable();
            $table->date('datestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_averages');
    }
}
