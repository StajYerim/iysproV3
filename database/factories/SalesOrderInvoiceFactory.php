<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Sales\SalesOrderInvoice::class, function (Faker $faker) {
    return [
        'seri' => 1,
        'number' => 1,
        'date' => create_a_random_date(),
        'due_date' => create_a_random_date(),
        'clock' => '5',
        'description' => $faker->name,
    ];
});
