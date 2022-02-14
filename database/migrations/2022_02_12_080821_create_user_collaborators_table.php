<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_collaborators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usercol_userid');
            $table->string('usercol_channel_id');
            $table->string('usercol_email');
            $table->string('usercol_type');
            $table->string('usercol_typestatus');
            $table->string('usercol_status')->default('active');
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
        Schema::dropIfExists('user_collaborators');
    }
}
