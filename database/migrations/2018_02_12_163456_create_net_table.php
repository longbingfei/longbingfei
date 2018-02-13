<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('net', function (Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->text('index_images');
            $tables->text('login_image');
            $tables->text('wechat_image')->nullable();
            $tables->text('about_us')->nullable();
            $tables->text('service')->nullable();
            $tables->text('help')->nullable();
            $tables->text('zone')->nullable();
            $tables->text('address')->nullable();
            $tables->text('tel')->nullable();
            $tables->text('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('net');
    }
}
