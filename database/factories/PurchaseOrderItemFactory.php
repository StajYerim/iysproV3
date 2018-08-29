<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Purchases\PurchaseOrderItems::class, function (Faker $faker) {
    return [
        'product_id'    => rand(1,1000),
        'quantity'      => rand(1,100),
        'unit_id'       => 20,
        'price'         => rand(100,1000),
        'vat'           => 18,
        'total'         => rand(1000,10000)

    ];
});
