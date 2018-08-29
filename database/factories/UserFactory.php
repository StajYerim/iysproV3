<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'confirmed'=>1,
        'account_id'=>1,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'mobile'    =>  $faker->e164PhoneNumber,
        'permissions'   => "[]",
        'confirmed' => 1,
        'confirmation_code' => '',
        'lang_id'  => 1,
        'role_id'   => 3,
        'account_id' => rand(1,10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
