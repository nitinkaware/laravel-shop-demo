<?php

namespace App\Jobs;

use App\Cart;
use App\Http\Requests\CheckoutCartSizeRequest;

class UpdateCheckOutCartSize {

    private $cart;

    private $sizeId;

    public function __construct(Cart $cart, $sizeId)
    {
        $this->cart = $cart;

        $this->sizeId = $sizeId;
    }

    public static function fromRequest(CheckoutCartSizeRequest $request)
    {
        return new static($request->cart(), $request->size());
    }

    public function handle()
    {
        return tap($this->cart)->update([
            'size_id' => $this->sizeId,
        ])->fresh();
    }
}
