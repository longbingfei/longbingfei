<?php

use Illuminate\Database\Seeder;

class NetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('net')->truncate();
        DB::table('net')->insert([
            'index_images'=>serialize([
                '/asset/web/images/banner1.jpg',
                '/asset/web/images/banner2.jpg',
                '/asset/web/images/banner3.jpg',
                '/asset/web/images/banner4.jpg',
                '/asset/web/images/banner5.jpg',
            ]),
            'login_image'=>'/asset/web/images/login_banner.png'
        ]);
    }
}
