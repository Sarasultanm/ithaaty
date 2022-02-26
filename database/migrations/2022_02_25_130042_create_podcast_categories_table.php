<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pc_categoryid');
            $table->integer('pc_podcastid');
            $table->string('pc_type')->default('podcast');
            $table->string('pc_typestatus')->default('active');
            $table->string('pc_status')->default('active');
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
        Schema::dropIfExists('podcast_categories');
    }
}
