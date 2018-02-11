<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prds', function (Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->string('sort_ids',20);
            $tables->string('area_ids',20);
            $tables->integer('company_id');
            $tables->tinyInteger('status')->default(0);//审核状态
            $tables->tinyInteger('fork')->default(0); //关注
            $tables->tinyInteger('hot')->default(0); //热度
            $tables->tinyInteger('is_promote')->default(0); //推荐
            $tables->string('name', 50)->unique();
            $tables->string('price', 50);
            $tables->smallInteger('storage');;
            $tables->text('images')->nullable();
            $tables->text('describe')->nullable();
            $tables->text('mark')->nullable();
            $tables->integer('user_id');
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
        Schema::drop('prds');
    }
}
