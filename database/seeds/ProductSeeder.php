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
            'fid'=>0,
            'name'=>'热销',
            'user_id'=>1
        ]);
        Product::create([
            'name'=>'A',
            'price'=>100,
            'storage'=>100,
            'describe'=>'nice',
            'user_id'=>1,
            'sort_id'=>1
        ]);
    }
}
