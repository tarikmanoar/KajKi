<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('number_of_vacancy')->after('last_date');
            $table->integer('experience')->after('last_date');
            $table->string('gender')->after('last_date');
            $table->string('salary')->after('last_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('number_of_vacancy');
            $table->dropColumn('experience');
            $table->dropColumn('gender');
            $table->dropColumn('salary');
        });
    }
}
