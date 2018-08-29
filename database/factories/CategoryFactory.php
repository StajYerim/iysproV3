<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Stock\Product\Category::class, function (Faker $faker) {
    return [
        'account_id' => rand(1,20),
        'name'       => $faker->name,
        'color'      => "#".rand(100,255).rand(100,255),
        'type'       => 'product'
    ];
});
