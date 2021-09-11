<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_references', function (Blueprint $table) {
            $table->increments('id');
            $table->string('audioref_userid');
            $table->string('audioref_audioid');
            $table->string('audioref_title');
            $table->string('audioref_link');
            $table->string('audioref_status');
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
        Schema::dropIfExists('audio_references');
    }
}
