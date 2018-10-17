<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        \DB::table('modules')->truncate();
        $data=[
            ['title'=>'系统','name'=>'Admin'],
            ['title'=>'文章','name'=>'Article','is_default'=>1],
        ];
        foreach ($data as $d){
            Module::create($d);
        }
        // $this->call("OthersTableSeeder");
    }
}
