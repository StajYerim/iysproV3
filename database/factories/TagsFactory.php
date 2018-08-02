<?php

use Faker\Generator as Faker;

$factory->define(App\Tags::class, function (Faker $faker) {
    return [
        'account_id' => rand(1,400),
        'title'      => $faker->word,
        'type'       => 'companies',
        'bg_color'   => "#".rand(100,255).rand(100,255),
    ];
});
