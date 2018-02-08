<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->tinyInteger('sort_id')->default(0);
            $tables->tinyInteger('area_id')->default(1);
            $tables->tinyInteger('period'); //周期
            $tables->tinyInteger('status')->default(0);
            $tables->tinyInteger('fork')->default(0); //报名
            $tables->tinyInteger('hot')->default(0); //热度
            $tables->string('title', 50);
            $tables->string('company_name', 50)->unique();
            $tables->integer('budget')->unsigned(); //预算
            $tables->integer('tel');
            $tables->integer('qq')->nullable();
            $tables->string('wechat')->nullable();
            $tables->text('images');
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
        Schema::drop('needs');
    }
}
