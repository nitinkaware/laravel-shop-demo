<?php

namespace App\Http\Controllers;

class AllProductsListingController extends Controller {

    public function index()
    {
        return view('products.all.index');
    }
}
