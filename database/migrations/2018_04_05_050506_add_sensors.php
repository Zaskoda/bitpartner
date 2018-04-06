<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('api_token', 60)->unique()->nullable();
            $table->timestamps();
        });

        Schema::table('readings', function (Blueprint $table) {
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
        Schema::dropIfExists('sensors');

        Schema::table('readings', function (Blueprint $table) {
            $table->dropColumn('sensor_id');
        });
    }
}
