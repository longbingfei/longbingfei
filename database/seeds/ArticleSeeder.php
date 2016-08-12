<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleSort;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('article_sorts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        ArticleSort::create([
            'fid' => 0,
            'name' => '系统',
            'user_id'=> 1,
        ]);
        Article::create([
            'title' => '还没有文章?赶快新增一篇吧!',
            'content'=> Inspiring::quote(),
            'status'=> 1,
            'author_id'=>1,
            'sort_id'=>1,
        ]);
    }
}
