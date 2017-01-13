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
        Schema::create('article_sorts', function(Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->integer('fid')->unsigned();
            $tables->tinyInteger('is_last')->default(1);
            $tables->string('name', 40);
            $tables->integer('user_id');
            $tables->timestamps();
        });

        Schema::create('articles', function(Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->string('title', 40);
            $tables->integer('author_id')->unsigned();
            $tables->text('content');
            $tables->integer('sort_id')->unsigned();
            $tables->foreign('sort_id')->references('id')->on('article_sorts')->onDelete('cascade');
            $tables->tinyInteger('status')->default(0);
            $tables->text('index_pic')->nullable();
            $tables->string('tag_ids', 50)->nullable()->default(0);
            $tables->integer('editor_id')->unsigned()->nullable();
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
        Schema::drop('article_sorts');
    }
}
