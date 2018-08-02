<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Stock\Product\Product::class, function (Faker $faker) {
    return [
        'code' => rand(1,999),
        'type_id' => rand(1,3),
        'vat_rate' => rand(1,18),
        'unit_id'   => 20,
        'category_id' => rand(1,3000),
        'archived'  => 0,
        'currency'  => 'try',
        'buying_price' => rand(10,100),
        'list_price'   => rand(100,200),
        'account_id'   => rand(1,20)
    ];
});
