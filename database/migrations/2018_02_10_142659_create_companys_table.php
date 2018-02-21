<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $tables) {
            $tables->increments('id')->unsigned();
            $tables->string('sort_ids',20);
            $tables->string('operate_ids',100);
            $tables->tinyInteger('status')->default(0);//审核状态
            $tables->tinyInteger('fork')->default(0); //关注
            $tables->tinyInteger('hot')->default(0); //热度
            $tables->tinyInteger('is_promote')->default(0); //推荐
            $tables->string('area_ids',20);
            $tables->string('company_name', 50)->unique();
            $tables->string('address', 50);
            $tables->string('name',10);
            $tables->integer('tel');
            $tables->integer('qq')->nullable();
            $tables->string('wechat')->nullable();
            $tables->string('email')->nullable();
            $tables->text('image')->nullable();
            $tables->text('logo')->nullable();
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
        Schema::drop('companys');
    }
}
