<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressCollection;
use App\Http\Resources\CartCheckoutCollection;

class AddressCheckoutController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $addresses = (new AddressCollection(
            auth()->user()->addresses()->get()
        ))->response()->getContent();

        $cart = (new CartCheckoutCollection(
            auth()->user()->carts()->with('product.variants', 'color', 'size')->get()
        ))->response()->getContent();

        return view('checkout.address.index', [
            'addresses' => $addresses,
            'cart'      => $cart,
        ]);
    }
}
