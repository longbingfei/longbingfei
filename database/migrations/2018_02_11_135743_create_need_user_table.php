<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_company', function (Blueprint $tables) {
            $tables->tinyInteger('company_id');
            $tables->tinyInteger('need_id');
            $tables->tinyInteger('status')->default(0);
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
        Schema::drop('need_company');
    }
}
