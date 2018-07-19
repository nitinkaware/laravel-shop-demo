<?php

namespace Tests\Feature;

use App\Http\Resources\ProductResource;
use App\Product;
use App\ProductStatistic;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function it_fetches_the_product_for_given_id()
    {
        $product = factory(Product::class)->create();

        factory(ProductStatistic::class)->create(['product_id' => $product]);

        $this->getJson(route('api.products.index', [$product, $product->category]))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['id', 'name', 'statistics'],
            ]);
    }

    /** @test */
    function it_returns_404_for_invalid_record()
    {
        $this->getJson(route('api.products.index', [1, 2]))
            ->assertStatus(404)
            ->assertJsonStructure([]);
    }
}
