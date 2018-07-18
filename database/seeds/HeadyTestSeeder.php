<?php

use App\Category;
use App\Product;
use App\ProductStatistic;
use App\Tax;
use Illuminate\Database\Seeder;
use Zttp\PendingZttpRequest;

class HeadyTestSeeder extends Seeder {

    const URL = 'https://stark-spire-93433.herokuapp.com/json';
    /**
     * @var PendingZttpRequest
     */
    protected $zttp;

    public function __construct()
    {
        $this->zttp = new PendingZttpRequest();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apiRecords = $this->zttp->get(self::URL)->json();

        $categories = collect($apiRecords['categories']);

        $rankings = collect($apiRecords['rankings']);

        $this->seedCategories($categories);

        $this->seedVariants($categories);

        $this->seedRankings($rankings);
    }

    private function seedCategories($categories): void
    {
        $categories->each(function ($category) {

            $c = Category::forceCreate([
                'id'   => $category['id'],
                'name' => trim($category['name']),
                'slug' => str_slug(trim($category['name'])),
            ]);

            $c->subCategories()->attach($category['child_categories']);

            collect($category['products'])->each(function ($product) use ($c) {

                $tax = Tax::firstOrCreate($product['tax']);

                $tax->products()->create([
                    'id'          => $product['id'],
                    'category_id' => $c->getKey(),
                    'name'        => trim($product['name']),
                    'created_at'  => now()->parse($product['date_added'])->toDateTimeString(),
                ]);
            });
        });
    }

    private function seedVariants($categories)
    {
        $categories->pluck('products')
            ->collapse()
            ->each(function ($product) {
                Product::find($product['id'])->variants()->createMany($product['variants']);
            });
    }

    private function seedRankings($rankings)
    {
        $rankings->pluck('products')->collapse()->each(function ($product) {

            $type = array_keys($product)[1];

            $productStatistics = ProductStatistic::find($product['id']);

            if ($productStatistics) {
                $productStatistics->{$type} = $product[$type];
                $productStatistics->save();
            } else {
                ProductStatistic::forceCreate([
                    'product_id' => $product['id'],
                    $type        => $product[$type],
                ]);
            }
        });
    }
}
