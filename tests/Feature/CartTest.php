<?php

namespace Tests\Feature;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function product_id_is_required()
    {
        $this->postJson(route('api.checkout.cart.store'))
            ->assertStatus(422)
            ->assertJsonValidationErrors('product_id');
    }

    /** @test */
    function it_should_exits_in_database()
    {
        $this->postJson(route('api.checkout.cart.store'), ['product_id' => 2])
            ->assertStatus(422)
            ->assertJsonValidationErrors('product_id');
    }

    /** @test */
    function if_item_has_size_is_required_when_adding_item_to_cart_else_not_required()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        $product->variants()->createMany([
            [
                'color' => 'Red',
                'size'  => 42,
                'price' => 1999,
            ],
            [
                'color' => 'Black',
                'size'  => 40,
                'price' => 1999,
            ],
        ]);

        // Add a size to product. If product has size then the size is required.
        $this->postJson(route('api.checkout.cart.store'), ['product_id' => $product->getKey()])
            ->assertStatus(422)
            ->assertJsonValidationErrors('size_id');

        $product->variants()->delete();

        // If the product does not have sizes, then it is not required
        $this->postJson(route('api.checkout.cart.store'), ['product_id' => $product->getKey()])
            ->assertStatus(202);
    }

    /** @test */
    function size_should_be_exits_in_the_database()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        // Add some variants to product.
        $product->variants()->create([
            'color' => 'red',
            'size'  => 13,
            'price' => 3000,
        ]);

        $this->postJson(route('api.checkout.cart.store'), [
            'product_id' => $product->getKey(),
            'size_id'    => 13,
        ])->assertStatus(422)
            ->assertJsonValidationErrors('size_id');
    }

    /** @test */
    function if_item_has_color_is_required_when_adding_item_to_cart_else_not_required()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        $product->variants()->createMany([
            [
                'color' => 'Red',
                'size'  => 42,
                'price' => 1999,
            ],
        ]);

        // Add a size to product. If product has size then the size is required.
        $this->postJson(route('api.checkout.cart.store'), ['product_id' => $product->getKey()])
            ->assertStatus(422)
            ->assertJsonValidationErrors('color_id');

        $product->variants()->delete();

        // If the product does not have sizes, then it is not required
        $this->postJson(route('api.checkout.cart.store'), ['product_id' => $product->getKey()])
            ->assertStatus(202);
    }

    /** @test */
    function color_should_be_exits_in_the_database()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        // Add some variants to product.
        $product->variants()->create([
            'color' => 'red',
            'size'  => 13,
            'price' => 3000,
        ]);

        $this->postJson(route('api.checkout.cart.store'), [
            'product_id' => $product->getKey(),
            'size_id'    => 1,
            'color_id'   => 4343,
        ])->assertStatus(422)
            ->assertJsonValidationErrors('color_id');

        $product->variants()->delete();

        $this->postJson(route('api.checkout.cart.store'), ['product_id' => $product->getKey()])
            ->assertStatus(202);
    }

    /** @test */
    function it_adds_item_to_cart()
    {
        $product = factory(Product::class)->create();

        $product->variants()->create([
            'color' => 'red',
            'size'  => 13,
            'price' => 3000,
        ]);

        $this->postJson(route('api.checkout.cart.store', [
            'product_id' => $product->getKey(),
            'size_id'    => 1,
            'color_id'   => 1,
        ]))->assertStatus(202);

        $this->assertEquals(1, Cart::count());
    }
}
