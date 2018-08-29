<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Sales\SalesOrderItems::class, function (Faker $faker) {
    return [
        'product_id' => rand(1,1000),
        'quantity'   => 50,
        'unit_id'    => 20,
        'price'      => rand(100,1000),
        'vat'        => 18,
        'total'      => rand(1000,2000),
        'termin_date'=> create_a_random_date(),
    ];
});
