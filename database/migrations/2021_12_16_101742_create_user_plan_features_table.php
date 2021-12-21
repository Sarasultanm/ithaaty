<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlanFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plan_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('planoption_planid');
            $table->string('planoption_name');
            $table->string('planoption_description');
            $table->string('planoption_options');
            $table->string('planoption_status');
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
        Schema::dropIfExists('user_plan_features');
    }
}
