<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCheckoutCollection extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($cart) {


                return [
                    'id'      => $cart->id,
                    'price'   => (float) $cart->color->price,
                    'quantity'   => $cart->quantity,
                    'product' => [
                        'id'       => $cart->product->id,
                        'name'     => $cart->product->name,
                        'tax'      => [
                            'id'    => $cart->product->tax->id,
                            'value' => (float) $cart->product->tax->value,
                        ],
                    ],
                    'color'   => [
                        'id'   => $cart->color->id,
                        'name' => ucfirst($cart->color->color),
                    ],
                    'size'    => [
                        'id'   => optional($cart->size)->id,
                        'name' => optional($cart->size)->size,
                    ],
                ];
            }),
        ];
    }
}
