<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoreCoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('coins', function (Blueprint $table) {
            $table->string('paper')->nullable();
            $table->string('creator')->nullable();
            $table->string('twitter')->nullable();
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coins', function (Blueprint $table) {
            $table->dropColumn('paper');
            $table->dropColumn('creator');
            $table->dropColumn('twitter');
            $table->dropColumn('logo');
        });
    }
}
