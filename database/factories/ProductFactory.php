<?php

use Faker\Generator as Faker;

$productNames = collect([
    'Nike Sneakers',
    'Adidas Running Shoes',
    'Spykar Denim',
    'Lee Cotton Jeans',
    'Polo Collar T-Shirt',
    'Adidas Nylon',
    'Comfort Tracks',
    'Adidas Trousers',
    'Bata Lace up Shoes',
    'Franco Leather',
    'Wrangler Checked Shirt',
    'Printed Shirt',
    'Iphone 6S',
    'Iphone 7',
    'Galaxy S7 Edge',
    'Galaxy J5',
    'Dell Inspiron Core',
    'Dell Inspiron 11',
    'Satellite Pro',
    'Satellite P50',
    'Roadster Loafers',
    'Light Loafers',
    'Floaters',
    'Denim Wash',
    'Pepe Jeans Slim Fit',
    'Spykar Funky Regular',
    'Being Human Collar T-shirt',
    'V - Neck Smart T-Shirt',
    'Manchester United',
    'Superdry track',
    'Night Comfy Track',
    'Superdry Joggers',
    'Iphone 6',
    'Iphone 6s Plus',
    'Iphone 7 Plus',
    'Galaxy J7',
    'Galaxy Grand Prime',
    'Note 4',
]);

$factory->define(App\Product::class, function (Faker $faker) use ($productNames) {
    return [
        'name'        => $productNames->random(),
        'tax_id'      => function () {
            return factory(\App\Tax::class)->create();
        },
        'category_id' => function () {
            return factory(\App\Category::class)->create();
        },
    ];
});