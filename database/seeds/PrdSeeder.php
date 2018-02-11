<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Prd;

class PrdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prds')->truncate();
        Prd::create([
            'name' => '野生粽子',
            'price' => 100,
            'storage' => 100,
            'describe' => '刚逮到的一只野生的粽子,味道不错,糖心的!',
            'user_id' => 1,
            'sort_ids' => '1,2,3',
            'images' => '',
            'is_promote' => 1,
            'status' => 1,
            'fork' => 11,
            'hot' => 111,
            'area_ids' => '3,40,425',
            'company_id' => 1,
        ]);
    }
}
