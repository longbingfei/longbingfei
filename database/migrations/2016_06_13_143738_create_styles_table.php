<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles',function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('type',20);
            $table->string('describe',200)->nullable();
            $table->string('image_path',200)->nullable();
            $table->string('link',200)->nullable();
            $table->tinyInteger('status')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::drop('styles');
    }
}
