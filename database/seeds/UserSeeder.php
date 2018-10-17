<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users=factory(\App\User::class,30)->create();
        $user=$users[0];
        $user->name="sclzdj";
        $user->nickname="军哥";
        $user->email="scdujun@qq.com";
        $user->email_token=str_random(64);
        $user->email_status=1;
        $user->save();
    }
}
