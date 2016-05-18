<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->integer('module_id')->unsigned();
            $tables->string('type',10);
            $tables->string('name',50);
            $tables->string('path');
            $tables->integer('user_id')->unsigned();
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
        Schema::drop('medias');
    }
}
