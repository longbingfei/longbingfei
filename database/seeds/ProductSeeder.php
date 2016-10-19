<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductSort;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('product_sorts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        ProductSort::create([
            'fid'     => 0,
            'name'    => '热销',
            'user_id' => 1
        ]);
        ProductSort::create([
            'fid'     => 0,
            'name'    => '新品',
            'user_id' => 1
        ]);
        ProductSort::create([
            'fid'     => 0,
            'name'    => '实惠',
            'user_id' => 1
        ]);
        Product::create([
            'pid'         => 000001,
            'name'        => '野生粽子',
            'price'       => 100,
            'storage'     => 100,
            'describe'    => '刚逮到的一只野生的粽子,味道不错,糖心的!',
            'user_id'     => 1,
            'sort_id'     => 1,
            'images'      => serialize(
                [
                    [
                        'id'    => 1,
                        'name'  => 'zz',
                        'path'  => 'default/images/zz.jpg',
                        'thumb' => 'default/images/zz-thumb.jpg'
                    ]
                ]
            ),
            'is_promote'  => 1,
            'is_carousel' => 1
        ]);
    }
}
