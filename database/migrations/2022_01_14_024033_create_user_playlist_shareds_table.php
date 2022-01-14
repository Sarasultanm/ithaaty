<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlaylistSharedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_playlist_shareds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plshared_playlistid');
            $table->string('plshared_userid');
            $table->string('plshared_role');
            $table->string('plshared_status')->default("active");
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
        Schema::dropIfExists('user_playlist_shareds');
    }
}
