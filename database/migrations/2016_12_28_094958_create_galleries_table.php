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
        Schema::create('galleries', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('index_pic')->nullable();
            $table->text('images')->nullable();
            $table->text('describes')->nullable();
            $table->string('tags')->nullable();
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
    }
}
