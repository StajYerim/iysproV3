<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'contact_name' => $faker->name,
        'contact_phone' =>$faker->phoneNumber,
        'contact_email' => $faker->companyEmail
    ];
});
