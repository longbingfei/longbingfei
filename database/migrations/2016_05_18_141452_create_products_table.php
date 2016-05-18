<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->string('name',40);
            $tables->integer('price')->unsigned();
            $tables->integer('storage')->default(100);
            $tables->tinyInteger('status')->default(0);
            $tables->tinyInteger('evaluate')->default(0);
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
        Schema::drop('products');
    }
}
