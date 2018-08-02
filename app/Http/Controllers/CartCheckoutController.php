<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartCheckoutCollection;

class CartCheckoutController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = auth()->user()->carts()->with('product.tax', 'product.variants', 'color', 'size')->get();

        return view('checkout.cart.index', ['itemsInCart' => new CartCheckoutCollection($cart)]);
    }
}
