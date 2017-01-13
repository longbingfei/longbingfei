<?php

use App\Models\Gallery;
use App\Models\GallerySort;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        GallerySort::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        GallerySort::create([
            'fid'     => 0,
            'name'    => '系统',
            'user_id' => 1
        ]);
        Gallery::create([
            'title'     => '初始化相册',
            'keywords'  => '相册',
            'index_pic' => json_encode([
                "name"       => "naruto",
                "sort_id"    => 1,
                "path"       => "default/images/gallery1.jpeg",
                "thumb"      => "default/images/gallery1-thumb.jpeg",
                "user_id"    => 1,
                "updated_at" => Date('Y-m-d H:i:s', time()),
                "created_at" => Date('Y-m-d H:i:s', time()),
                "id"         => 1
            ]),
            'images'    => json_encode([
                [
                    "name"       => "naruto",
                    "sort_id"    => 1,
                    "path"       => "default/images/gallery1.jpeg",
                    "thumb"      => "default/images/gallery1-thumb.jpeg",
                    "user_id"    => 1,
                    "updated_at" => Date('Y-m-d H:i:s', time()),
                    "created_at" => Date('Y-m-d H:i:s', time()),
                    "id"         => 1
                ]
                , [
                    "name"       => "bijiu",
                    "sort_id"    => 1,
                    "path"       => "default/images/gallery2.jpeg",
                    "thumb"      => "default/images/gallery2-thumb.jpeg",
                    "user_id"    => 1,
                    "updated_at" => Date('Y-m-d H:i:s', time()),
                    "created_at" => Date('Y-m-d H:i:s', time()),
                    "id"         => 1
                ]
            ]),
            'describes' => json_encode(['naruto', 'bijiu']),
            'sort_id'   => 1,
            'status'    => 1,
            'weight'    => 0,
            'user_id'   => 1
        ]);
    }
}
