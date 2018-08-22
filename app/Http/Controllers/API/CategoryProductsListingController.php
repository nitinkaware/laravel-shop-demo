<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Product;

class CategoryProductsListingController extends Controller
{

    public function index($categorySlug)
    {
        $products = Product::with('variants', 'category')->whereHas('category', function ($query) use ($categorySlug) {
            $query->filterByParentCategory($categorySlug);
        })->get();

        return new ProductCollection($products);
    }
}
