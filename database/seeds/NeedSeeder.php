<?php

use Illuminate\Database\Seeder;
use App\Models\Need;
use App\Models\NeedCompany;
use Illuminate\Support\Facades\DB;

class NeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('needs')->truncate();
        Need::create([
            'sort_id' => '1',
            'area_ids' => 1,
            'period' => 10,
            'status' => 1,
            'fork' => 10,
            'hot' => 10,
            'title' => '测试需求',
            'company_name' => '惺惺惜惺惺',
            'budget' => 100000,
            'tel' => 19989898988,
            'qq' => 123333,
            'wechat' => 111,
            'images' => '',
            'describe' => '测试需求描述',
            'mark' => '1111',
            'user_id' => 2,
        ]);

        DB::table('need_company')->truncate();
        NeedCompany::create([
            'company_id' => '1',
            'need_id' => '1',
        ]);
    }
}
