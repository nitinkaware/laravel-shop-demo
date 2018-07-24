<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Jobs\AddToCart;

class CartController extends Controller {

    public function store(CartRequest $request)
    {
        $response = $this->dispatchNow(AddToCart::fromRequest($request));

        return response()->json($response, 202);
    }
}
