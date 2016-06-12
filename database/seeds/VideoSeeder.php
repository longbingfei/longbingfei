<?php

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\VideoSort;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('videos')->truncate();
        DB::table('video_sorts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        VideoSort::create([
            'name'=>'系统',
            'fid'=>0,
            'user_id'=>1
        ]);
        VideoSort::create([
            'name'=>'普通',
            'fid'=>0,
            'user_id'=>1
        ]);
    }
}
