<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugsAndLongerUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('platforms', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique;
        });


        Schema::table('jobs', function (Blueprint $table) {
            $table->renameColumn('company_website', 'company_link');
        });

        Schema::table('icos', function (Blueprint $table) {
            $table->renameColumn('accounce_link', 'announce_link');
        });


        Schema::table('exchanges', function (Blueprint $table) {
            $table->string('link',255)->nullable()->change();
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('company_link',255)->nullable()->change();
        });
        Schema::table('platforms', function (Blueprint $table) {
            $table->string('link',255)->nullable()->change();
        });
        Schema::table('icos', function (Blueprint $table) {
            $table->string('announce_link',255)->nullable()->change();
            $table->string('company_link',255)->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('platforms', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->renameColumn('company_link', 'company_website');
        });
    }
}
