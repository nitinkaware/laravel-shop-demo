<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Support\Collection;

class ProductsController extends Controller {

    public function index($category, Product $product)
    {
        $product = new ProductResource($product->load(['statistics', 'variants', 'tax']));

        $topProducts = new ProductCollection($this->getMostOrderedProducts($category));

        return view('products.index', compact('product', 'topProducts'));
    }

    /**
     * @param $category
     *
     * @return Collection
     */
    private function getMostOrderedProducts($category): Collection
    {
        return Product::with('tax', 'variants', 'category')->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })->select('products.*')->join('product_statistics', 'products.id', '=', 'product_statistics.product_id')
            ->latest('order_count')->take(10)->get();
    }
}
