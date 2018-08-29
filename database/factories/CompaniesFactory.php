<?php

use Faker\Generator as Faker;

$factory->define(App\Companies::class, function (Faker $faker) {
    $random_number = rand(1,10);
    if($random_number % 2 == 0)
    {
        return [
            'account_id'    => rand(1,20),
            'company_name'  => $faker->company,
            'company_short_name' => shorten($faker->name,4),
            'char_code'=>$faker->numberBetween(5),
            'tax_id'=>$faker->numberBetween(11),
            'customer'      => 0,
            'supplier'      => 1,
            'tax_office'=>$faker->text(5),
            'e_invoice_registered' => 0,
            'iban'=>'TR'.$faker->numberBetween(13)
        ];
    }
    else
    {
        return [
            'account_id'    => rand(1,20),
            'company_name'  => $faker->company,
            'company_short_name' => shorten($faker->name,4),
            'char_code'=>$faker->numberBetween(5),
            'tax_id'=>$faker->numberBetween(11),
            'customer'      => 1,
            'supplier'      => 0,
            'tax_office'=>$faker->text(5),
            'e_invoice_registered' => 0,
            'iban'=>'TR'.$faker->numberBetween(13)
        ];
    }
});
