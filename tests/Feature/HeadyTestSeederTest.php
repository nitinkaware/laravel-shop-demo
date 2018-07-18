<?php

namespace Tests\Feature;

use App\Category;
use App\Product;
use App\ProductStatistic;
use App\Tax;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Zttp\PendingZttpRequest;

class HeadyTestSeederTest extends TestCase {

    use RefreshDatabase;

    const URL = 'https://stark-spire-93433.herokuapp.com/json';

    /**
     * @var PendingZttpRequest
     */
    protected $zttp;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->zttp = new PendingZttpRequest();
    }

    /** @test */
    function it_seeds_categories()
    {
        Artisan::call('db:seed');

        $this->callApi('categories')->map(function ($category) {
            return [
                'id'   => $category['id'],
                'name' => trim($category['name']),
                'slug' => str_slug(trim($category['name'])),
            ];
        })->each(function ($category) {
            $this->assertDatabaseHas('categories', $category);
        });
    }

    /** @test */
    function it_seeds_products()
    {
        Artisan::call('db:seed');

        /** @var Collection $products */
        $products = $this->callApi('categories')->pluck('products')->collapse();

        //Assert that it seeds each products.;
        $products->map(function ($product) {
            return [
                'id'         => $product['id'],
                'name'       => trim($product['name']),
                'created_at' => now()->parse($product['date_added'])->toDateTimeString(),
            ];
        })->each(function ($product) {
            $this->assertDatabaseHas('products', $product);
        });

        // Assert that it seeds all variants.
        $products->each(function ($product) {
            $this->assertCount(Product::find($product['id'])->variants()->count(), $product['variants']);
        });
    }

    /** @test */
    function it_seeds_variants()
    {
        Artisan::call('db:seed');

        /** @var Collection $products */
        $products = $this->callApi('categories')->pluck('products')->collapse();

        // Assert that it seeds all variants.
        $products->each(function ($product) {
            $this->assertCount(Product::find($product['id'])->variants()->count(), $product['variants']);
        });
    }

    /** @test */
    function it_seeds_tax()
    {
        Artisan::call('db:seed');

        /** @var Collection $products */
        $products = $this->callApi('categories')->pluck('products')->collapse();

        // Assert that it seeds all variants.
        $products->each(function ($product) {
            $this->assertNotNull(Tax::where($product['tax'])->first()->products()->find($product['id']));
        });
    }

    /** @test */
    function it_seeds_sub_categories()
    {
        Artisan::call('db:seed');

        $this->callApi('categories')->each(function ($category) {
            $this->assertCount(Category::find($category['id'])->subCategories()->count(), $category['child_categories']);
        });
    }

    /** @test */
    function it_seeds_product_statistics_table()
    {
        Artisan::call('db:seed');

        $this->callApi('rankings')->pluck('products')->collapse()->each(function ($product) {

            $type = array_keys($product)[1];

            $productStat = ProductStatistic::select('product_id', $type)->where([
                'product_id' => $product['id'],
                $type        => $product[$type],
            ])->first();

            $this->assertNotNull($productStat);
        });
    }

    public function callApi($type)
    {
        return collect($this->zttp->get(self::URL)->json()[$type]);
    }
}
