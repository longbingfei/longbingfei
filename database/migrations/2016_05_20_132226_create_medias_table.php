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
            $tables->string('title',100);
            $tables->string('sort',20);
            $tables->string('path',250);
            $tables->integer('frame_id')->nullable();
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
        Schema::drop('medias');
    }
}
