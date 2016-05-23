<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'username'=>'yuri',
            'password'=>password_hash('1234',PASSWORD_BCRYPT),
            'avatar'=>1,
            'sex'=>1,
            'email'=>'zhangxianrenren@163.com',
            'tel'=>12345678910,
            'status'=>1,
            'last_login_time'=>\Carbon\Carbon::now(),
            'last_login_ip'=>'127.0.0.1'
        ]);
    }
}
