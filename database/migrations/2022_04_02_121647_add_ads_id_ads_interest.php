<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdsIdAdsInterest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads_interests', function (Blueprint $table) {
            $table->renameColumn('ai_id','ai_interestid');
            $table->integer('ai_adsid')->after('ai_ownerid');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads_interest', function (Blueprint $table) {
            //
        });
    }
}
