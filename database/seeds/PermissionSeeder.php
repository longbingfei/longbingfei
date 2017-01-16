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
                ['pname' => 'user-list', 'name' => '用户列表'],
                ['pname' => 'user-op', 'name' => '用户操作'],
                ['pname' => 'article-list', 'name' => '文稿列表'],
                ['pname' => 'article-add', 'name' => '文稿新增'],
                ['pname' => 'article-edit', 'name' => '文稿修改'],
                ['pname' => 'article-del', 'name' => '文稿删除'],
                ['pname' => 'article-sort', 'name' => '文稿分类'],
                ['pname' => 'product-list', 'name' => '商品列表'],
                ['pname' => 'product-add', 'name' => '商品新增'],
                ['pname' => 'product-edit', 'name' => '商品修改'],
                ['pname' => 'product-del', 'name' => '商品删除'],
                ['pname' => 'product-sort', 'name' => '商品分类'],
                ['pname' => 'style', 'name' => '首页样式'],
                ['pname' => 'db', 'name' => '数据维护'],
                ['pname' => 'image-list', 'name' => '图片列表'],
                ['pname' => 'sys', 'name' => '服务状态'],
            ];
        DB::table('permissions')->insert($permissions);
        DB::table('roles')->insert([
            ['name' => '管理员', 'user_id' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' =>
                \Carbon\Carbon::now()],
            ['name' => '普通用户', 'user_id' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' =>
                \Carbon\Carbon::now()],
            ['name' => '测试', 'user_id' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' =>
                \Carbon\Carbon::now()],
        ]);
        $admin_permissions = [];
        for ($i = 1; $i <= count($permissions); $i ++) {
            $admin_permissions[] = ['role_id' => 1, 'permission_id' => $i];
        }
        $user_permissions = [
            ['role_id' => 2, 'permission_id' => 3],
            ['role_id' => 2, 'permission_id' => 4],
            ['role_id' => 2, 'permission_id' => 5],
            ['role_id' => 2, 'permission_id' => 6],
            ['role_id' => 2, 'permission_id' => 8],
            ['role_id' => 3, 'permission_id' => 3],
            ['role_id' => 3, 'permission_id' => 8],
        ];
        DB::table('roles_permissions')->insert(array_merge($admin_permissions, $user_permissions));
        DB::table('roles_users')->insert(['user_id' => 1, 'role_id' => 1]);
        DB::table('roles_users')->insert(['user_id' => 2, 'role_id' => 2]);
        DB::table('roles_users')->insert(['user_id' => 3, 'role_id' => 3]);
    }
}
