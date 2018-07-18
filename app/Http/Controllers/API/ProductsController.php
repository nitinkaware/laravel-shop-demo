<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Product;

class ProductsController extends Controller {

    public function index($categorySlug)
    {
        $ids = Category::whereSlug($categorySlug)->first()->subCategories()->pluck('id');

        $products = Product::with('tax', 'variants', 'category')->whereIn('category_id', $ids)->get();

        return new ProductCollection($products);
    }
}
