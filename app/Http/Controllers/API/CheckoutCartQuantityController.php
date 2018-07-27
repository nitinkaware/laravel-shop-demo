<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutCartQuantityRequest;
use App\Jobs\UpdateCheckOutCartQuantity;

class CheckoutCartQuantityController extends Controller {

    public function update(CheckoutCartQuantityRequest $request)
    {
        $cart = $this->dispatchNow(UpdateCheckOutCartQuantity::fromRequest($request));

        return response()->json($cart, 202);
    }
}
