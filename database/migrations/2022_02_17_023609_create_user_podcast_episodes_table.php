<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPodcastEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_podcast_episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poditem_podcastid');
            $table->integer('poditem_audioid');
            $table->string('poditem_type')->default('audio');
            $table->string('poditem_typestatus')->default('active');
            $table->string('podcast_status')->default('active');
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
        Schema::dropIfExists('user_podcast_episodes');
    }
}
