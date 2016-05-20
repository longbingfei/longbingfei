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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('roles_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('permission_groups')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::table('permission_groups')->insert([
            ['name'=>'Auth'],
            ['name'=>'Article'],
            ['name'=>'Product'],
            ['name'=>'Media'],
        ]);
        $permissions =
            [
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
            ];
        DB::table('permissions')->insert($permissions);
        DB::table('roles')->insert([
            ['name'=>'admin','user_id'=>1,'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['name'=>'user','user_id'=>1,'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
        ]);
        $admin_permissions = [];
        for($i = 1;$i<=count($permissions);$i++){
            $admin_permissions[] = ['role_id'=>1,'permission_id'=>$i];
        }
        $user_permissions = [
            ['role_id'=>2,'permission_id'=>2],
            ['role_id'=>2,'permission_id'=>5],
            ['role_id'=>2,'permission_id'=>6],
            ['role_id'=>2,'permission_id'=>7],
        ];
        DB::table('roles_permissions')->insert(array_merge($admin_permissions,$user_permissions));
    }
}
