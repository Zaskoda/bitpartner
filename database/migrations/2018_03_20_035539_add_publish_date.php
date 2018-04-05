<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->date('publish_date')->nullable();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->date('publish_date')->nullable();
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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('publish_date');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('publish_date');
        });
    }
}
