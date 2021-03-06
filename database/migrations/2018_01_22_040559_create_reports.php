<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('readings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reporter')->nullable();
            $table->string('acc')->nullable();
            $table->string('pressure')->nullable();
            $table->string('rgb')->nullable();
            $table->string('soiltemp')->nullable();
            $table->string('temperature')->nullable();
            $table->string('moisture')->nullable();
            $table->string('lux')->nullable();
            $table->string('heading')->nullable();
            $table->datetime('timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('readings');
    }
}
