<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQiniuUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qiniu_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 100);
            $table->string('hash', 100);
            $table->smallInteger('w')->nullable();
            $table->smallInteger('h')->nullable();
            $table->string('symbol', 20);
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
        Schema::drop('qiniu_uploads');
    }
}
