<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'store_id' => rand(1,50),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => str_random(100),
        'user_id' => rand(1,50),
    ];
});



