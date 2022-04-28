<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPodcastIdPodcastInterest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcast_interests', function (Blueprint $table) {
            $table->renameColumn('pi_id','pi_interestid');
            $table->integer('pi_podcastid')->after('pi_ownerid');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcast_interest', function (Blueprint $table) {
            //
        });
    }
}
