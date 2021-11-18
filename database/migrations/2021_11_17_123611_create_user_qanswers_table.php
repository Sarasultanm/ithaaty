<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_qanswers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qn_qaid');
            $table->string('qn_audioid');
            $table->string('qn_useranswerid');
            $table->string('qn_answer');
            $table->string('qn_status');
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
        Schema::dropIfExists('user_qanswers');
    }
}
