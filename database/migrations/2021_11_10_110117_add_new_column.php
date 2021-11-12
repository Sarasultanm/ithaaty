<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads_lists', function (Blueprint $table) {
             $table->string('adslist_agebracket');
             $table->string('adslist_country');
             $table->string('adslist_weblink');
             $table->string('adslist_desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads_lists', function (Blueprint $table) {
            //
        });
    }
}
