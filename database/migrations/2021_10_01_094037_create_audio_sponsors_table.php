<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('audiospon_userid');
            $table->string('audiospon_audioid');
            $table->string('audiospon_name');
            $table->string('audiospon_website');
            $table->string('audiospon_location');
            $table->string('audiospon_linktolocation');
            $table->string('audiospon_imgpath');
            $table->string('audiospon_appearancetype');
            $table->string('audiospon_min1');
            $table->string('audiospon_min2');
            $table->string('audiospon_status');
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
        Schema::dropIfExists('audio_sponsors');
    }
}
