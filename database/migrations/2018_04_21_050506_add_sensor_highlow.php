<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSensorHighlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hourly_averages', function (Blueprint $table) {
            $table->string('hightemp')->nullable();
            $table->string('lowtemp')->nullable();
        });

        Schema::table('daily_averages', function (Blueprint $table) {
            $table->string('hightemp')->nullable();
            $table->string('lowtemp')->nullable();
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
            $table->dropColumn('hightemp');
            $table->dropColumn('lowtemp');
        });
        Schema::table('daily_averages', function (Blueprint $table) {
            $table->dropColumn('hightemp');
            $table->dropColumn('lowtemp');
        });
    }
}
