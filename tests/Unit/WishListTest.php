<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WishListTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function add_to_wish_list_test()
    {
        $user = factory(\App\User::class)->create();

        $product = factory(Product::class)->create();

        $user->wishList()->attach($product->getKey());

        $this->assertCount(1, $user->wishList()->get());
    }
}
