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
        DB::table('roles_users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $permissions =
            [
                ['name' => '用户列表'],
                ['name' => '用户操作'],
                ['name' => '控制台'],
                ['name' => '文稿列表'],
                ['name' => '文稿新增'],
                ['name' => '文稿修改'],
                ['name' => '文稿删除'],
                ['name' => '商品列表'],
                ['name' => '商品新增'],
                ['name' => '商品修改'],
                ['name' => '商品删除'],
                ['name' => '首页样式'],
            ];
        DB::table('permissions')->insert($permissions);
        DB::table('roles')->insert([
            ['name' => 'admin', 'user_id' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'user', 'user_id' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
        ]);
        $admin_permissions = [];
        for ($i = 1; $i <= count($permissions); $i ++) {
            $admin_permissions[] = ['role_id' => 1, 'permission_id' => $i];
        }
        $user_permissions = [
            ['role_id' => 2, 'permission_id' => 4],
            ['role_id' => 2, 'permission_id' => 8],
        ];
        DB::table('roles_permissions')->insert(array_merge($admin_permissions, $user_permissions));
        DB::table('roles_users')->insert(['user_id' => 1, 'role_id' => 1]);
        DB::table('roles_users')->insert(['user_id' => 2, 'role_id' => 2]);
    }
}
