<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartCheckoutCollection;

class CartCheckoutController extends Controller {

    public function index()
    {
        $cart = auth()->user()->carts()->with('product.tax', 'color', 'size')->get();

        return view('checkout.cart.index', ['itemsInCart' => new CartCheckoutCollection($cart)]);
    }
}
