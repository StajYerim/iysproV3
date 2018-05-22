<?php

use Faker\Generator as Faker;

$factory->define(App\Companies::class, function (Faker $faker) {
    return [
        'account_id'=>1,
        'customer'=>1,
        'company_name' => $faker->name,
        'company_short_name' => shorten($faker->name,4),
        'char_code'=>$faker->numberBetween(5),
        'tax_id'=>$faker->numberBetween(11),
        'tax_office'=>$faker->text(5),
        'iban'=>'TR'.$faker->numberBetween(13)
    ];
});
