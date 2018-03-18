<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpgradeStringToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('exchanges', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
        Schema::table('coins', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
        Schema::table('platforms', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
        Schema::table('icos', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
