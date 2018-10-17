<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Article\Entities\Content::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3),
        'author'=>$faker->sentence(2),
        'content'=>$faker->sentence(100),
        'thumb'=>$faker->imageUrl(600,300),
        'category_id'=>mt_rand(1,5),
        'is_top'=>mt_rand(0,1),
    ];
});
