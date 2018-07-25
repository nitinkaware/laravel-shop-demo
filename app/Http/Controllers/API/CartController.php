<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartCollection;
use App\Jobs\AddToCart;

class CartController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CartRequest $request)
    {
        $this->dispatchNow(AddToCart::fromRequest($request));

        return (new CartCollection($this->getCartCollection()))
            ->response()
            ->setStatusCode(202);;
    }

    private function getCartCollection()
    {
        return Cart::with('product', 'color', 'size')->get();
    }
}
