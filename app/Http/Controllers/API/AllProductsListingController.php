<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Product;

class AllProductsListingController extends Controller {

    public function index()
    {
        return new ProductCollection(Product::with('tax', 'variants', 'category')->get());
    }
}
