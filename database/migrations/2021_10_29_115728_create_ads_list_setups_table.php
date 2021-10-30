<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsListSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_list_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adssetup_adsid');
            $table->string('adssetup_audioid');
            $table->string('adssetup_rolltype');
            $table->string('adssetup_status');
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
        Schema::dropIfExists('ads_list_setups');
    }
}
