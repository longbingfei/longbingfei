<?php

use Illuminate\Database\Seeder;
use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->truncate();
        Style::create([
            'cid'      => 1,
            'type'     => 'carousel-product',
            'describe' => '轮播商品',
            'user_id'  => 1
        ]);
        Style::create([
            'cid'      => 1,
            'type'     => 'carousel-article',
            'describe' => '轮播文稿',
            'user_id'  => 1
        ]);
        Style::create([
            'cid'      => 1,
            'type'     => 'article',
            'describe' => '推荐文稿',
            'user_id'  => 1
        ]);
        Style::create([
            'cid'      => 1,
            'type'     => 'product',
            'describe' => '推荐商品',
            'user_id'  => 1
        ]);
    }

}
