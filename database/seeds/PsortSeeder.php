<?php

use Illuminate\Database\Seeder;

class PsortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('p_sorts')->truncate();
        DB::table('p_sorts')->insert([
            [
                'name'=>'产品测试分类1',
            ], [
                'name'=>'产品测试分类2',
            ], [
                'name'=>'产品测试分类3',
            ],[
                'name'=>'产品测试分类4',
            ],
        ]);
    }
}
