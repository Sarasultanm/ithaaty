<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_podcasts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('podcast_ownerid');
            $table->integer('podcast_channelid');
            $table->string('podcast_title');
            $table->text('podcast_description')->nullable();
            $table->integer('podcast_logo_id');
            $table->integer('podcast_cover_id');
            $table->text('podcast_uniquelink');
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
        Schema::dropIfExists('user_podcasts');
    }
}
