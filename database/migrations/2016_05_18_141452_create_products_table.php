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
        Schema::create('product_sorts',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->integer('fid')->unsigned();
            $tables->string('name',40);
            $tables->integer('user_id');
            $tables->timestamps();
        });

        Schema::create('products',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->string('name',40);
            $tables->integer('price')->unsigned();
            $tables->string('images',200);
            $tables->string('describe',100)->nullable();
            $tables->integer('storage')->default(100);
            $tables->integer('sort_id')->unsigned();
            $tables->foreign('sort_id')->references('id')->on('product_sorts')->onDelete('cascade');
            $tables->tinyInteger('status')->default(0);
            $tables->tinyInteger('evaluate')->default(5);
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
        Schema::drop('product_sorts');
    }
}
