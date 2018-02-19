<?php

use Illuminate\Database\Seeder;

class NsortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('n_sorts')->truncate();
        DB::table('n_sorts')->insert([
            [
                'name'=>'需求测试分类1',
            ], [
                'name'=>'需求测试分类2',
            ], [
                'name'=>'需求测试分类3',
            ],[
                'name'=>'需求测试分类4',
            ],
        ]);
    }
}
