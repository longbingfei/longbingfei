<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecoveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovery', function(Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->string('type', 20);
            $tables->integer('content_id')->unsigned();
            $tables->integer('material_id')->unsigned();
            $tables->integer('user_id');
            $tables->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recovery');
    }
}
