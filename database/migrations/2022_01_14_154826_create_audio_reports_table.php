<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('report_audioid');
            $table->string('report_userid');
            $table->string('report_type');
            $table->text('report_message');
            $table->string('report_status')->default('active');
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
        Schema::dropIfExists('audio_reports');
    }
}
