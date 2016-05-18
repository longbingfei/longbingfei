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
        DB::table('administrators')->truncate();
        Administrator::create([
            'username'=>'sign',
            'name'=>'zx',
            'password'=>password_hash('123321',PASSWORD_BCRYPT),
            'sex'=>1,
            'email'=>'sign_mail@163.com',
            'tel'=>17601558524,
            'status'=>1,
            'avatar'=>public_path('avatar/default.jpg'),
            'last_login_time'=>\Carbon\Carbon::now(),
            'last_login_ip'=>'192.168.1.1',
            'creator_id'=>'99999'
        ]);
    }
}
