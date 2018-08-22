<?php

namespace App\Jobs;

use App\Http\Requests\CartRequest;
use App\Product;

final class AddToCart {

    private $product;

    private $sizeId;

    private $colorId;

    public function __construct(Product $product, $sizeId, $colorId)
    {
        $this->product = $product;
        $this->sizeId = $sizeId;
        $this->colorId = $colorId;
    }

    public static function fromRequest(CartRequest $request)
    {
        return new static(
            $request->product(),
            $request->sizeId(),
            $request->colorId()
        );
    }

    public function handle()
    {
        $alreadyInCart = auth()->user()->carts()->where([
            'product_id' => $this->product->id,
            'color_id'   => $this->colorId,
            'size_id'    => $this->sizeId,
        ])->exists();

        abort_if($alreadyInCart, response()->json([], 208));

        return auth()->user()->carts()->create([
            'product_id' => $this->product->id,
            'color_id'   => $this->colorId,
            'size_id'    => $this->sizeId,
        ]);
    }
}
