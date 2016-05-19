<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->truncate();
        Module::create(['name'=>'auth','user_id'=>1]);
        Module::create(['name'=>'media','user_id'=>1]);
        Module::create(['name'=>'article','user_id'=>1]);
        Module::create(['name'=>'product','user_id'=>1]);
    }
}
