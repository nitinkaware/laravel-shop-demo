<?php

namespace Tests\Feature;

use App\Http\Resources\CartCheckoutCollection;
use App\Jobs\AddToCart;
use App\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartCheckoutTest extends TestCase {

    use RefreshDatabase, DispatchesJobs;

    /** @test */
    function it_should_get_all_the_items_in_the_cart_for_checkout()
    {
        $this->signIn();

        $this->addProductToCart();

        // Assert that correct json response returns.
        $response = $this->getJson(route('api.checkout.cart.index'));
        $response->assertStatus(200);

        $resource = (new CartCheckoutCollection(auth()->user()->carts()->with('product', 'color', 'size')->get()));

        $this->assertSame(json_decode($resource->response()->getContent(), true), $response->json());
    }

    private function addProductToCart(): void
    {
        /** @var Product $kurta */
        $kurta = factory(Product::class)->create(['name' => 'Libas Women Navy']);

        $kurta->variants()->createMany([
            [
                'color' => 'Green Printed Layered',
                'size'  => 30,
                'price' => 764,
            ],
            [
                'color' => 'Green Printed Layered',
                'size'  => 32,
                'price' => 764,
            ],
            [
                'color' => 'Blue Printed Layered',
                'size'  => 30,
                'price' => 1000,
            ],
            [
                'color' => 'Blue Printed Layered',
                'size'  => 32,
                'price' => 1000,
            ],
        ]);

        $this->dispatchNow(new AddToCart($kurta, 2, 2));
    }
}
