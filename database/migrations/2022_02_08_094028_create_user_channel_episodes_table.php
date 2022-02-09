<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChannelEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_channel_episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channelep_channelid');
            $table->string('channelep_audioid');
            $table->string('channelep_userid');
            $table->string('channelep_type');
            $table->string('channelep_typestatus');
            $table->string('channelep_status')->default('active');
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
        Schema::dropIfExists('user_channel_episodes');
    }
}
