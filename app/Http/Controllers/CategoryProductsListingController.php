<?php

namespace App\Http\Controllers;

class CategoryProductsListingController extends Controller {

    public function index()
    {
        return view('products.filtered.index');
    }
}
