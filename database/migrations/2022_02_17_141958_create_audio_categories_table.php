<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ac_categoryid');
            $table->integer('ac_audioid');
            $table->string('ac_type')->default('category');
            $table->string('ac_typestatus')->default('active');
            $table->string('ac_status')->default('active');
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
        Schema::dropIfExists('audio_categories');
    }
}
