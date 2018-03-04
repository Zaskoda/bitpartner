<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('symbol')->nullable();
            $table->string('genesis_date')->date()->nullable();
            $table->string('website')->nullable();
            $table->integer('forked_from')->nullable();
            $table->string('source')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins');
    }
}
