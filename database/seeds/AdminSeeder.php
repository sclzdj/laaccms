<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins=factory(\App\Admin::class,30)->create();
        $admin=$admins[0];
        $admin->name='admin';
        $admin->nickname='军哥';
        $admin->save();
        \Spatie\Permission\Models\Role::create([
            'title'=>'站长',
            'name'=>'webmaster',
            'guard_name'=>'admin',
        ]);
        $admin->assignRole('webmaster');
    }
}
