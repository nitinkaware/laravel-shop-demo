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
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\ProductStatistic::class, function (Faker $faker) {
    return [
        'product_id'  => function () {
            return factory(\App\Product::class)->create();
        },
        'view_count'  => $faker->randomDigit,
        'order_count' => $faker->randomDigit,
        'shares'      => $faker->randomDigit,
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {

    $name = $faker->name;

    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});

$factory->define(App\Address::class, function (Faker $faker) {

    return [
        'user_id'    => function () {
            return factory(\App\User::class)->create();
        },
        'pin_code'   => array_random([123456, 757575, 787877, 89898]),
        'town'       => $faker->city,
        'distinct'   => $faker->city,
        'state'      => $faker->word,
        'state_code' => $faker->countryCode,
        'name'       => $faker->name('m'),
        'address'    => $faker->address,
        'mobile'     => $faker->numberBetween(9222222222, 9999999999),
    ];
});
