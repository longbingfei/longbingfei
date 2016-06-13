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
            'type'=>'carousel',
            'describe'=>'快雪时晴',
            'image_path'=>'homepage/image/h1.jpg',
            'link'=>'#',
            'status'=>1,
            'user_id'=>1
        ]);
        Style::create([
            'type'=>'carousel',
            'describe'=>'古陵逝烟',
            'image_path'=>'homepage/image/h2.jpg',
            'link'=>'#',
            'status'=>1,
            'user_id'=>1
        ]);
        Style::create([
            'type'=>'carousel',
            'describe'=>'天赐饺子',
            'image_path'=>'homepage/image/h3.jpg',
            'link'=>'#',
            'status'=>1,
            'user_id'=>1
        ]);
        Style::create([
            'type'=>'article',
            'describe'=>'hello China',
            'image_path'=>null,
            'link'=>'#',
            'status'=>1,
            'user_id'=>1
        ]);
        Style::create([
            'type'=>'article',
            'describe'=>'hello World',
            'image_path'=>null,
            'link'=>'#',
            'status'=>1,
            'user_id'=>1
        ]);
        Style::create([
            'type'=>'article',
            'describe'=>'hello Universe',
            'image_path'=>null,
            'link'=>'#',
            'status'=>1,
            'user_id'=>1
        ]);
    }

}
