<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ai_ownerid');
            $table->integer('ai_id');
            $table->string('ai_type');
            $table->string('ai_typestatus');
            $table->string('ai_status')->default('active');
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
        Schema::dropIfExists('ads_interests');
    }
}
