<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pi_ownerid');
            $table->integer('pi_id');
            $table->string('pi_type');
            $table->string('pi_typestatus');
            $table->string('pi_status')->default('active');
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
        Schema::dropIfExists('podcast_interests');
    }
}
