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
        $this->call(ArticleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PermissionSeeder::class);
        //front
        $this->call(UserSeeder::class);
        Model::reguard();
    }
}
