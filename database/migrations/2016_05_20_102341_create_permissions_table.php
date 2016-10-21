<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('pname', 20);
            $table->string('name', 20);
        });

        Schema::create('roles', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 20);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('roles_permissions', function(Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
        Schema::create('roles_users', function(Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('administrators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles_permissions');
        Schema::drop('roles_users');
        Schema::drop('permissions');
        Schema::drop('roles');
    }
}
