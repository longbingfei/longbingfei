<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username', 12)->unique();
            $table->string('name', 6)->nullable();
            $table->string('password', 64);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('sex')->default(3);
            $table->bigInteger('tel')->nullable();
            $table->string('email')->nullable();
            $table->text('avatar')->nullable();
            $table->string('remember_token')->nullable();
            $table->integer('creator_id');
            $table->dateTime('last_login_time')->nullable();
            $table->string('last_login_ip', 15)->nullable();
            $table->dateTime('login_at');
            $table->string('login_ip');
            $table->string('access_token', 40)->nullable();
            $table->dateTime('token_expr_at')->nullable();
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
        Schema::drop('administrators');
    }
}
