<?php

namespace Tests\Factories;

use App\Product;
use App\Variant;

trait ProductFactory {

    public function productWithVariants($config = []): Product
    {
        $product = factory(Product::class)->create();

        $variants = factory(Variant::class, $config['variants_count'] ?? 5)
            ->make();

        $product->variants()->saveMany($variants);

        return $product;
    }
}