<?php

namespace App\Jobs;

use App\Http\Requests\CartRequest;
use App\Product;
use App\Variant;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        return new static($request->product(), $request->sizeId(), $request->colorId());
    }

    public function handle()
    {
        $color = Variant::find($this->colorId);
        $size = Variant::find($this->sizeId);

        return Cart::add([
            'id'      => $this->product->getKey(),
            'name'    => $this->product->name,
            'qty'     => 1,
            'price'   => $color->price,
            'options' => [
                'size'  => $size->size,
                'color' => $color->color,
            ]]);
    }
}
