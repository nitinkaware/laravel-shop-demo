<?php

use Faker\Generator as Faker;

$factory->define(\App\Variant::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return factory(\App\Product::class)->create();
        },
        'color'      => $faker->colorName,
        'size'       => $faker->numberBetween(38, 42),
        'price'      => $faker->numberBetween(1000, 1500),
    ];
});


$factory->state(App\Variant::class, 'electronic', function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(50000, 10000),
    ];
});