<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('as_adslistid');
            $table->string('as_country');
            $table->string('as_age');
            $table->string('as_gender');
            $table->string('as_status');
            $table->string('as_device');
            $table->ipAddress('as_ipaddress');
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
        Schema::dropIfExists('ads_stats');
    }
}
