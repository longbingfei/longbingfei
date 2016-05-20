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
        $this->call(ModuleSeeder::class);
        $this->call(AuthSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PermissionSeeder::class);
        Model::reguard();
    }
}
