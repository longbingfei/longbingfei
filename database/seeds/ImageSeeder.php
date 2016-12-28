<?php

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\ImageSort;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('images')->truncate();
        DB::table('image_sorts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        ImageSort::create([
            'name'    => '系统图片',
            'fid'     => 0,
            'user_id' => 1
        ]);
        ImageSort::create([
            'name'    => '视频截图',
            'fid'     => 0,
            'user_id' => 1
        ]);
        ImageSort::create([
            'name'    => '商品图片',
            'fid'     => 0,
            'user_id' => 1
        ]);
        ImageSort::create([
            'name'    => '文稿索引',
            'fid'     => 0,
            'user_id' => 1
        ]);
        ImageSort::create([
            'name'    => '一般图片',
            'fid'     => 0,
            'user_id' => 1
        ]);
        ImageSort::create([
            'name'    => '相册图片',
            'fid'     => 0,
            'user_id' => 1
        ]);
        Image::create([
            'name'    => '默认头像',
            'sort_id' => 1,
            'path'    => 'default/images/default_avatar.jpeg',
            'thumb'   => 'default/images/default_avatar.jpeg',
            'user_id' => 1
        ]);
        Image::create([
            'name'    => 'zz',
            'sort_id' => 1,
            'path'    => 'default/images/zz.jpg',
            'thumb'   => 'default/images/zz-thumb.jpg',
            'user_id' => 1
        ]);
    }
}
