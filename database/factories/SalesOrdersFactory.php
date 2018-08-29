<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Sales\SalesOrders::class, function (Faker $faker) {
    return [
        'account_id'    => rand(1,10),
        'company_id'    => rand(1,10),
        'description'   => $faker->name,
        'currency'      => 'try',
        'currency_value'=> 0,
        'sub_total'     => 3000,
        'vat_total'     => 240,
        'grand_total'   => 3240,
        'date'          => create_a_random_date(),
        'due_date'      => create_a_random_date(),
    ];
});
