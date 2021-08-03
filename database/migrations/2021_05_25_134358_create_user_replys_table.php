<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_replys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rep_userid');
            $table->string('rep_audioid');
            $table->string('rep_commentid');
            $table->string('rep_type');
            $table->string('rep_message');
            $table->string('rep_status');
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
        Schema::dropIfExists('user_replys');
    }
}
