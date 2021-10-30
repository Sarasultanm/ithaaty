<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adslist_id');
            $table->string('adslist_name');
            $table->string('adslist_videolink');
            $table->string('adslist_adstype');
            $table->string('adslist_durationtype');
            $table->string('adslist_displaytime');
            $table->string('adslist_status');
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
        Schema::dropIfExists('ads_lists');
    }
}
