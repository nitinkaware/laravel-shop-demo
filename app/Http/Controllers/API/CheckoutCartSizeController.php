<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CheckoutCartSizeRequest;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateCheckOutCartSize;

class CheckoutCartSizeController extends Controller
{
    public function update(CheckoutCartSizeRequest $request)
    {
        $cart = $this->dispatchNow(UpdateCheckOutCartSize::fromRequest($request));

        return response()->json($cart, 202);
    }
}
