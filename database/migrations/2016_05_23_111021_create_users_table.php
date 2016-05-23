<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->increments('id');
            $table->string('username',12)->unique();
            $table->string('password',64);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('sex')->default(3);
            $table->bigInteger('tel')->nullable();
            $table->string('email')->nullable();
            $table->integer('avatar')->default(1);
            $table->string('remember_token')->nullable();
            $table->dateTime('last_login_time');
            $table->string('last_login_ip',15);
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
        Schema::drop('users');
    }
}
