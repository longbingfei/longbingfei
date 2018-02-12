<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function(Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->string('title', 40);
            $tables->text('content')->nullable();
            $tables->tinyInteger('is_promote')->default(0);
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
        Schema::drop('news');
    }
}
