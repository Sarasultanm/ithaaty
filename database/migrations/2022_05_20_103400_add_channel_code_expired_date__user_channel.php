<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChannelCodeExpiredDateUserChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_channels', function (Blueprint $table) {
            $table->string('channel_privatecode')->default('none');
            $table->string('channel_privatecode_expired')->default('none');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_channels', function (Blueprint $table) {
            //
        });
    }
}
