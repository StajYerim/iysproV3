<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Companies\Address::class, function (Faker $faker) {
    return [
        'address' => $faker->country,
        'town' => $faker->text(5),
        'city' => $faker->city,
        'email' => $faker->companyEmail,
        'phone_number' => $faker->numberBetween(10),
        'fax_number' => $faker->numberBetween(10),
        'company_id' => function () {
            return factory(\App\Companies::class)->create()->id;
        }
    ];
});
