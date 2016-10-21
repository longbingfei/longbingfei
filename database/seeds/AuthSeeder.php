<?php

use Illuminate\Database\Seeder;
use App\Models\Administrator;
use Illuminate\Support\Facades\DB;
class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('administrators')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Administrator::create([
            'username'=>'sign',
            'name'=>'zx',
            'password'=>password_hash('123321',PASSWORD_BCRYPT),
            'sex'=>1,
            'email'=>'sign_mail@163.com',
            'tel'=>17601558524,
            'status'=>3,
            'last_login_time'=>\Carbon\Carbon::now(),
            'last_login_ip'=>'192.168.1.1',
            'creator_id'=>'99999'
        ]);
        Administrator::create([
            'username'=>'kotana',
            'name'=>'kk',
            'password'=>password_hash('123321',PASSWORD_BCRYPT),
            'sex'=>2,
            'email'=>'sign_mail@163.com',
            'tel'=>17601558524,
            'status'=>2,
            'last_login_time'=>\Carbon\Carbon::now(),
            'last_login_ip'=>'10.0.5.224',
            'creator_id'=>'1'
        ]);
        Administrator::create([
            'username'=>'yuri',
            'name'=>'nn',
            'password'=>password_hash('123321',PASSWORD_BCRYPT),
            'sex'=>2,
            'email'=>'sign_mail@163.com',
            'tel'=>17601558524,
            'status'=>1,
            'last_login_time'=>\Carbon\Carbon::now(),
            'last_login_ip'=>'10.0.5.224',
            'creator_id'=>'1'
        ]);
    }
}
