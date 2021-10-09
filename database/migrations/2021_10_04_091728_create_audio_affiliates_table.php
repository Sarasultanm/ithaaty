<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_affiliates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('audioafi_userid');
            $table->string('audioafi_audioid');
            $table->string('audioafi_title');
            $table->string('audioafi_link');
            $table->string('audioafi_status');
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
        Schema::dropIfExists('audio_affiliates');
    }
}
