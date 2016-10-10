<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CerateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs',function(Blueprint $tables){
            $tables->dateTime('date');
            $tables->integer('user_id');
            $tables->string('username',20);
            $tables->string('module',20);
            $tables->string('action',20);
            $tables->text('info');
            $tables->smallInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
