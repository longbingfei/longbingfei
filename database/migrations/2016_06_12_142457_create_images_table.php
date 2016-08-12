<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_sorts',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->integer('fid')->unsigned()->default(0);
            $tables->string('name',250);
            $tables->integer('user_id');
            $tables->timestamps();
        });
        Schema::create('images',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->string('name',100);
            $tables->integer('sort_id')->unsigned()->default(0);
            $tables->foreign('sort_id')->references('id')->on('image_sorts')->onDelete('cascade');
            $tables->string('path',250);
            $tables->string('thumb',250);
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
        Schema::drop('images');
        Schema::drop('image_sorts');
    }
}
