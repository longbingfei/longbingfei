<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        Tag::create([
            'name'    => '热门',
            'mark'    => '标记一下热门',
            'user_id' => 1
        ]);
        Tag::create([
            'name'    => '特殊',
            'mark'    => '标记一下特殊',
            'user_id' => 1
        ]);
    }
}
