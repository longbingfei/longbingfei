<?php
use Illuminate\Database\Seeder;
use App\Models\WebUser;
use Illuminate\Support\Facades\DB;

class WebUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('webusers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        WebUser::create([
            'username' => 'admin',
            'name' => 'admin',
            'password' => password_hash('123321', PASSWORD_BCRYPT),
            'sex' => 1,
            'type' => 2,
            'email' => 'test@163.com',
            'tel' => 12345678910,
            'status' => 1,
            'last_login_time' => \Carbon\Carbon::now(),
            'last_login_ip' => '192.168.1.1',
            'creator_id' => '99999'
        ]);
        WebUser::create([
            'username' => 'kotana',
            'name' => 'kk',
            'password' => password_hash('123321', PASSWORD_BCRYPT),
            'sex' => 2,
            'type' => 1,
            'email' => 'kotana@163.com',
            'tel' => 12345678910,
            'status' => 1,
            'last_login_time' => \Carbon\Carbon::now(),
            'last_login_ip' => '10.0.5.224',
            'creator_id' => '1'
        ]);
        WebUser::create([
            'username' => 'yuri',
            'name' => 'nn',
            'password' => password_hash('123321', PASSWORD_BCRYPT),
            'sex' => 2,
            'email' => 'yuri@163.com',
            'tel' => 12345678910,
            'status' => 0,
            'last_login_time' => \Carbon\Carbon::now(),
            'last_login_ip' => '10.0.5.224',
            'creator_id' => '1'
        ]);
    }
}
