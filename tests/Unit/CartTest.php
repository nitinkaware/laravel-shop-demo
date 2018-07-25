<?php

namespace Tests\Unit;

use App\Cart;
use App\Product;
use App\Variant;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function a_product_can_be_added_to_cart()
    {
        $this->signIn();

        /** @var Product $product */
        $product = factory(Product::class)->create();

        $product->variants()->create([
            'color' => 'red',
            'size'  => 13,
            'price' => 3000,
        ]);

        $variant = Variant::first();

        auth()->user()->carts()->create([
            'product_id' => $product->getKey(),
            'color_id'   => $variant->id,
            'size_id'    => $variant->id,
        ]);

        $this->assertEquals(1, auth()->user()->carts()->count());
    }
}
