<?php

namespace App\Jobs;

use App\Cart;
use App\Http\Requests\CheckoutCartQuantityRequest;

final class UpdateCheckOutCartQuantity {

    private $cart;

    private $quantity;

    public function __construct(Cart $cart, int $quantity)
    {
        $this->cart = $cart;

        $this->quantity = $quantity;
    }

    public static function fromRequest(CheckoutCartQuantityRequest $request)
    {
        return new static($request->cart(), $request->quantity());
    }

    public function handle()
    {
        return tap($this->cart)->update([
            'quantity' => $this->quantity,
        ])->fresh();
    }
}
