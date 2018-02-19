<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //back
        $this->call(ModuleSeeder::class);
        $this->call(AuthSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(TagSeeder::class);
        //front
        $this->call(UserSeeder::class);
        $this->call(WebUserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(PrdSeeder::class);
        $this->call(NeedSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(NetSeeder::class);
        $this->call(CsortSeeder::class);
        $this->call(NsortSeeder::class);
        $this->call(PsortSeeder::class);
        Model::reguard();
    }
}
