<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioPremiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_premiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ap_audioid');
            $table->string('ap_date');
            $table->string('ap_typestatus')->default('active');
            $table->string('ap_status')->default('active');
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
        Schema::dropIfExists('audio_premiers');
    }
}
