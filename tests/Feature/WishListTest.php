<?php

namespace Tests\Feature;

use App\Product;
use App\WishList;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WishListTest extends TestCase {

    use  RefreshDatabase;

    /** @test */
    function a_user_should_be_logged_in_before_product_add_to_wishlist()
    {
        $this->postJson(route('api.wishlist.store'))
            ->assertStatus(401);
    }

    /** @test */
    function a_product_id_is_required()
    {
        $this->signIn();

        $this->postJson(route('api.wishlist.store'))
            ->assertStatus(422)
            ->assertJsonValidationErrors(['product_id']);
    }

    /** @test */
    function a_product_id_must_be_exits_in_database()
    {
        $this->signIn();

        $this->postJson(route('api.wishlist.store'))
            ->assertStatus(422)
            ->assertJsonValidationErrors(['product_id']);
    }

    /** @test */
    function a_user_can_add_product_to_wish_list()
    {
        $this->signIn();

        $product = factory(Product::class)->create();

        $this->postJson(route('api.wishlist.store'), ['product_id' => $product->getKey()])
            ->assertStatus(202)
            ->assertJson([]);

        $this->assertTrue(WishList::exists());
    }
}
