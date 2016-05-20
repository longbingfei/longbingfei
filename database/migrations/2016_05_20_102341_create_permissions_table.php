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
        Schema::create('permission_groups',function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('name',20);
        });
        Schema::create('permissions',function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('permission_groups')->onDelete('cascade');
            $table->string('name',20);
        });

        Schema::create('roles',function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('name',20);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('roles_permissions',function(Blueprint $table){
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
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
        Schema::drop('permissions');
        Schema::drop('permission_groups');
        Schema::drop('roles');
    }
}
