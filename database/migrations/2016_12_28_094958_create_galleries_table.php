<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_sorts', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('fid')->unsigned();
            $table->tinyInteger('is_last')->default(1);
            $table->string('name', 40);
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('galleries', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('index_pic')->nullable();
            $table->text('images')->nullable();
            $table->text('describes')->nullable();
            $table->string('tag_ids', 50)->nullable()->default(0);
            $table->integer('sort_id')->unsigned();
            $table->foreign('sort_id')->references('id')->on('gallery_sorts')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
            $table->integer('weight')->default(0);
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
        Schema::drop('galleries');
        Schema::drop('gallery_sorts');
    }
}
