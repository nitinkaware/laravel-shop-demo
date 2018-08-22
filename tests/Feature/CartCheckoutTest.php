<?php

namespace Tests\Feature;

use App\Cart;
use App\Http\Resources\CartCheckoutCollection;
use App\Jobs\AddToCart;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Tests\Factories\ProductFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartCheckoutTest extends TestCase {

    use RefreshDatabase, DispatchesJobs, ProductFactory;

    /** @test */
    function a_user_should_be_signed_in()
    {
        $this->get(route('checkout.cart.index'))->assertRedirect('/login');
    }

    /** @test */
    function it_should_return_all_the_items_in_the_cart()
    {
        $this->signIn();

        $this->addProductToCart();

        $response = $this->getJson(route('api.checkout.cart.index'));

        $response->assertStatus(200);

        $resource = (new CartCheckoutCollection(auth()->user()->carts()->with('product', 'color', 'size')->get()));

        $this->assertSame(json_decode($resource->response()->getContent(), true), $response->json());
    }

    /** @test */
    function quantity_is_required()
    {
        $this->signIn();

        $this->addProductToCart();

        $this->putJson(route('api.checkout.quantity.update', Cart::first()))
            ->assertStatus(422)
            ->assertJsonValidationErrors('quantity');
    }

    /** @test */
    function quantity_should_be_between_1_to_5_and_number()
    {
        $this->signIn();

        $this->addProductToCart();

        $this->putJson(route('api.checkout.quantity.update', Cart::first()), [
            'quantity' => 6,
        ])->assertStatus(422)->assertJsonValidationErrors('quantity');

        //It should be integer.
        $this->putJson(route('api.checkout.quantity.update', Cart::first()), [
            'quantity' => 'sd',
        ])->assertStatus(422)->assertJsonValidationErrors('quantity');
    }

    /** @test */
    function it_should_return_404_if_the_cart_id_is_invalid()
    {
        $this->signIn();

        $this->addProductToCart();

        $this->putJson(route('api.checkout.quantity.update', 10), [
            'quantity' => 4,
        ])->assertStatus(404);
    }

    /** @test */
    function it_should_update_the_quantity_in_the_cart()
    {
        $this->signIn();

        $this->addProductToCart();

        $this->putJson(route('api.checkout.quantity.update', Cart::first()), [
            'quantity' => 3,
        ])->assertStatus(202);

        $this->assertEquals(3, Cart::first()->quantity);
    }

    /** @test */
    function product_size_is_required()
    {
        $this->signIn();

        $this->addProductToCart();

        $this->putJson(route('api.checkout.size.update', Cart::first()))
            ->assertStatus(422)
            ->assertJsonValidationErrors('size_id');
    }

    /** @test */
    function product_size_should_be_valid_for_cart_product_is_required()
    {
        $this->signIn();

        $this->addProductToCart();

        // Size should be exits in database and it should be associated with that product.
        $this->putJson(route('api.checkout.size.update', Cart::first()), [
            'size_id' => 121,
        ])->assertStatus(422)
            ->assertJsonValidationErrors('size_id');

        $this->putJson(route('api.checkout.size.update', 121), [
            'size_id' => 1,
        ])->assertStatus(422)
            ->assertJsonValidationErrors('size_id');
    }

    /** @test */
    function user_can_update_the_product_size()
    {
        $this->signIn();

        $this->addProductToCart();

        $this->assertEquals(2, Cart::first()->size_id);

        // Size should be exits in database and it should be associated with that product.
        $this->putJson(route('api.checkout.size.update', Cart::first()), [
            'size_id' => 1,
        ])->assertStatus(202);

        $this->assertEquals(1, Cart::first()->size_id);
    }

    private function addProductToCart(): void
    {
        $product = $this->productWithVariants(['variants_count' => 2]);

        $this->dispatchNow(new AddToCart($product, $sizeId = 2, $colorId = 2));
    }
}
