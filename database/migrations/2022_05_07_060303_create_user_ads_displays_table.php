<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAdsDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ads_displays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uad_userid');
            $table->integer('uad_adsid');
            $table->string('uad_type');
            $table->string('uad_typestatus');
            $table->string('uad_status')->default('active');
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
        Schema::dropIfExists('user_ads_displays');
    }
}
