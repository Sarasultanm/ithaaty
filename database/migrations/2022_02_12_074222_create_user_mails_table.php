<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_sender_id');
            $table->string('mail_reciever_id')->default('0');
            $table->string('mail_link_id');
            $table->string('mail_type');
            $table->string('mail_typestatus');
            $table->string('mail_expired');
            $table->string('mail_status')->default('active');
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
        Schema::dropIfExists('user_mails');
    }
}
