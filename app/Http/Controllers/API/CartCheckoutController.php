<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartCheckoutCollection;

class CartCheckoutController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = auth()->user()->carts()->with('product.variants', 'color', 'size')->get();

        return new CartCheckoutCollection($cart);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return $this->index()->response()->setStatusCode(202);
    }
}
