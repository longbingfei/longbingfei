<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->string('title',40);
            $tables->integer('author_id')->unsigned();
            $tables->integer('content')->default(100);
            $tables->tinyInteger('status')->default(0);
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
       Schema::drop('articles');
    }
}
