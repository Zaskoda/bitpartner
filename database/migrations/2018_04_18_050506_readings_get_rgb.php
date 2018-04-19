<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReadingsGetRGB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('readings', function (Blueprint $table) {
            $table->integer('red')->nullable();
            $table->integer('green')->nullable();
            $table->integer('blue')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('readings', function (Blueprint $table) {
            $table->dropColumn('red');
            $table->dropColumn('green');
            $table->dropColumn('blue');
        });
    }
}
