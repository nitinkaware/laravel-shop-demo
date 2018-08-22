<?php

use Faker\Generator as Faker;

$factory->define(App\Tax::class, function (Faker $faker) {
    return [
        'name'  => 'VAT',
        'value' => array_random([12.50, 4]),
    ];
});

$factory->state(App\Tax::class, 'wear', [
    'value' => 12.50,
]);

$factory->state(App\Tax::class, 'electronic', [
    'value' => 4,
]);