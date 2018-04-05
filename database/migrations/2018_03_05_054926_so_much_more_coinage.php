<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SoMuchMoreCoinage extends Migration
{
    public function up()
    {

        Schema::table('coins', function (Blueprint $table) {
            $table->string('reddit')->nullable();
            $table->string('docs')->nullable();
            $table->string('wikipedia')->nullable();
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
            $table->dropColumn('reddit');
            $table->dropColumn('docs');
            $table->dropColumn('wikipedia');
        });
    }
}
