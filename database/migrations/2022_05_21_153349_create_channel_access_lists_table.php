<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelAccessListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_access_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cal_channel_id');
            $table->integer('cal_userid');
            $table->string('cal_type');
            $table->string('cal_expireddate');
            $table->string('cal_typestatus')->default('active');
            $table->string('cal_status')->default('active');
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
        Schema::dropIfExists('channel_access_lists');
    }
}
