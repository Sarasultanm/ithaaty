<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ash_adslistid');
            $table->string('ash_country');
            $table->string('ash_age');
            $table->string('ash_gender');
            $table->string('ash_status')->default('active');
            $table->string('ash_device');
            $table->ipAddress('ash_ipaddress');
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
        Schema::dropIfExists('ads_shows');
    }
}
