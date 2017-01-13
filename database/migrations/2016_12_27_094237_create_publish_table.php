<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('cid')->unsigned();
            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('index_pic')->nullable();
            $table->string('tag_ids')->nullable()->default(0);
            $table->string('type', 20);
            $table->string('path', 255);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publish');
    }
}
