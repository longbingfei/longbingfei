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
            $tables->integer('material_id')->unsigned();
            $tables->string('type', 20);
            $tables->text('info');
            $tables->integer('user_id');
            $tables->dateTime('created_at');
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
