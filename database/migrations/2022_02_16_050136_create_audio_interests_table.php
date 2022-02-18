<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ai_interestid');
            $table->string('ai_audioid');
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
        Schema::dropIfExists('audio_interests');
    }
}
