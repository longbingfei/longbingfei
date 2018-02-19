<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_sorts')->truncate();
        DB::table('c_sorts')->insert([
            [
                'name'=>'厂家测试分类1',
            ], [
                'name'=>'厂家测试分类2',
            ], [
                'name'=>'厂家测试分类3',
            ],[
                'name'=>'厂家测试分类4',
            ],
        ]);
    }
}
