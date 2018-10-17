<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Category::where('id', '<=', '5')->delete();
        $data = [
            ['name' => '汽车'],
            ['name' => '游戏'],
            ['name' => '影视'],
            ['name' => '社会'],
            ['name' => '政治'],
        ];
        foreach ($data as $d) {
            Category::create($d);
        }
        factory(Content::class, 1000)->create();
        // $this->call("OthersTableSeeder");
    }
}
