<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSensorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hourly_averages', function (Blueprint $table) {
            $table->integer('sensor_id')->nullable();
        });

        Schema::table('daily_averages', function (Blueprint $table) {
            $table->integer('sensor_id')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hourly_averages', function (Blueprint $table) {
            $table->dropColumn('sensor_id');
        });
        Schema::table('daily_averages', function (Blueprint $table) {
            $table->dropColumn('sensor_id');
        });
    }
}
