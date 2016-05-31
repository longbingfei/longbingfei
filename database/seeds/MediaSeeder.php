<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medias')->truncate();
        Media::create([
            'title'=>'默认头像',
            'sort'=>'image',
            'path'=>'default/images/default_avatar.jpeg',
            'user_id'=>1
        ]);
    }
}
