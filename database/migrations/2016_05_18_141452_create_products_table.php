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
            $tables->tinyInteger('is_last')->default(1);
            $tables->string('name',40);
            $tables->integer('user_id');
            $tables->timestamps();
        });

        Schema::create('products',function(Blueprint $tables){
            $tables->increments('id')->unsigned();
            $tables->string('pid',20)->unique();
            $tables->string('name',40);
            $tables->integer('price')->unsigned();
            $tables->text('images');
            $tables->text('describe')->nullable();
            $tables->integer('storage')->default(100);
            $tables->integer('sort_id')->unsigned();
            $tables->foreign('sort_id')->references('id')->on('product_sorts')->onDelete('cascade');
            $tables->tinyInteger('status')->default(0);
            $tables->tinyInteger('evaluate')->default(5);
            $tables->string('tag_ids', 50)->nullable()->default(0);
            $tables->integer('user_id');
            $tables->tinyInteger('is_promote')->default(0);
            $tables->tinyInteger('is_carousel')->default(0);
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
