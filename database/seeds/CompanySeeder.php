<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companys')->truncate();
        Company::create([
            'sort_ids' => 1,
            'operate_ids' => '化学,工程',
            'status' => 1,
            'fork' => 11,
            'hot' => 111,
            'area_ids' => '3,40,425',
            'company_name' => '测试公司名',
            'address' => '亚运村1号',
            'name' => '李燕燕',
            'tel' => '15555555555',
            'qq' => '1222121',
            'wechat' => 'wewww',
            'email' => '123@qq.com',
            'image' => '',
            'describe' => '测试机哦',
            'mark' => '',
            'user_id' => 1,
        ]);

        Company::create([
            'sort_ids' => 1,
            'operate_ids' => '的味道,化学,工程',
            'status' => 1,
            'fork' => 22,
            'hot' => 44,
            'area_ids' => '3,40,425',
            'company_name' => '测试公司名2',
            'address' => '亚运村12号',
            'name' => '叼的',
            'tel' => '15555555555',
            'qq' => '1222121',
            'wechat' => 'wewww',
            'email' => '123@qq.com',
            'image' => '',
            'describe' => '111测试机哦',
            'mark' => '',
            'user_id' => 2,
        ]);
    }
}
