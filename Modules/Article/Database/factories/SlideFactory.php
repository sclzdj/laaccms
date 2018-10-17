<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Article\Entities\Slide::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3),
        'url'=>$faker->url(),
        'pic'=>$faker->imageUrl(600,300),
        'status'=>mt_rand(0,1),
    ];
});
