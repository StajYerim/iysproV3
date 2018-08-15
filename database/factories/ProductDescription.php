<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Stock\Product\ProductDescriptions::class, function (Faker $faker) {
    return [
        'lang_code' => 'tr',
        'name'  => $faker->name,
    ];
});
