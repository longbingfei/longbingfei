<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_sorts',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->integer('fid')->unsigned()->default(0);
            $tables->string('name',250);
            $tables->integer('user_id');
            $tables->timestamps();
        });
        Schema::create('videos',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->string('name',100);
            $tables->integer('sort_id')->unsigned()->default(0);
            $tables->foreign('sort_id')->references('id')->on('video_sorts')->onDelete('cascade');
            $tables->string('path',250);
            $tables->string('frame_path',250);
            $tables->tinyInteger('status')->default(1)->unsigned();
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
        Schema::drop('videos');
        Schema::drop('video_sorts');
    }
}
