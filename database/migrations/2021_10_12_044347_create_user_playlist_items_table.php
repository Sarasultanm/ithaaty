<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlaylistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_playlist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plitems_userid');
            $table->string('plitems_plid');
            $table->string('plitems_audioid');
            $table->string('plitems_ownerid');
            $table->string('plitems_status');
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
        Schema::dropIfExists('user_playlist_items');
    }
}
