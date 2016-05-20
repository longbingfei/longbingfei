<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('permission_groups')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::table('permission_groups')->insert([
            ['name'=>'Auth'],
            ['name'=>'Article'],
            ['name'=>'Product'],
            ['name'=>'Media'],
        ]);
        DB::table('permissions')->insert([
            ['group_id'=>1,'name'=>'create'],
            ['group_id'=>1,'name'=>'update'],
            ['group_id'=>1,'name'=>'delete'],
            ['group_id'=>1,'name'=>'audit'],
            ['group_id'=>2,'name'=>'create'],
            ['group_id'=>2,'name'=>'update'],
            ['group_id'=>2,'name'=>'delete'],
            ['group_id'=>2,'name'=>'audit'],
            ['group_id'=>2,'name'=>'publish'],
            ['group_id'=>2,'name'=>'read'],
            ['group_id'=>3,'name'=>'create'],
            ['group_id'=>3,'name'=>'update'],
            ['group_id'=>3,'name'=>'delete'],
            ['group_id'=>3,'name'=>'audit'],
            ['group_id'=>3,'name'=>'publish'],
            ['group_id'=>3,'name'=>'read'],
            ['group_id'=>4,'name'=>'create'],
            ['group_id'=>4,'name'=>'update'],
            ['group_id'=>4,'name'=>'delete'],
            ['group_id'=>4,'name'=>'audit'],
            ['group_id'=>4,'name'=>'publish'],
            ['group_id'=>4,'name'=>'read'],

        ]);
    }
}
