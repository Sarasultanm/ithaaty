<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_setups', function (Blueprint $table) {
            $table->string('setup_ownerid');
            $table->string('setup_type');
            $table->string('setup_typestatus');
            $table->string('setup_status')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_setups', function (Blueprint $table) {
            //
        });
    }
}
