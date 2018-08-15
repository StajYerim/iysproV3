<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Purchases\PurchaseOrders::class, function (Faker $faker) {
    return [
        'account_id'    => rand(1,20),
        'description'   => $faker->name,
        'company_id'    => rand(1,20),
        'currency'      => 'try',
        'currency_Value'=> 0,
        'sub_total'     => rand(10,100),
        'vat_total'     => rand(100,500),
        'grand_total'   => rand(500,10000),
        'date'          => create_a_random_date(),
        'due_date'      => create_a_random_Date(),
    ];
});
