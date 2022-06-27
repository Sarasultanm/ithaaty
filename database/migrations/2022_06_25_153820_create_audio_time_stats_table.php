<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTimeStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_time_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ats_userid');
            $table->integer('ats_audioid');
            $table->string('ats_viewedtime');
            $table->string('ats_audiolenght');
            $table->string('ats_typestatus')->default('active');
            $table->string('ats_status')->default('active');
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
        Schema::dropIfExists('audio_time_stats');
    }
}
