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
            'data'  => $this->collection->transform(function ($cart) {

                return [
                    'id'       => $cart->id,
                    'price'    => (float) $cart->color->price,
                    'quantity' => $cart->quantity,
                    'product'  => [
                        'id'       => $cart->product->id,
                        'name'     => $cart->product->name,
                        'variants' => $cart->product->variants,
                        'tax'      => [
                            'id'    => $cart->product->tax->id,
                            'value' => (float) $cart->product->tax->value,
                        ],
                    ],
                    'color'    => [
                        'id'   => $cart->color->id,
                        'name' => ucfirst($cart->color->color),
                    ],
                    'size'     => [
                        'id'   => optional($cart->size)->id,
                        'name' => optional($cart->size)->size,
                    ],
                ];
            }),
            'order' => [
                'sum'           => (float) $this->collection->sum(function ($cart) {
                    return (float) $cart['price'] * $cart['quantity'];
                }),
                'tax'           => $this->collection->sum(function ($cart) {
                    $total = (float) $cart['price'] * $cart['quantity'];
                    return ($total * data_get($cart, 'product.tax.value')) / 100;
                }),
                'payable'       => $this->collection->sum(function ($cart) {
                    $total = (float) $cart['price'] * $cart['quantity'];
                    $tax = ($total * data_get($cart, 'product.tax.value')) / 100;
                    return $tax + $total;
                }),
            ],
        ];
    }
}
