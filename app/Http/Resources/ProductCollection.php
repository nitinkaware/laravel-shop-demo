<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection {

    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($product) {

                return [
                    'id'            => $product->id,
                    'name'          => $product->name,
                    'category'      => new CategoryResource($product->category),
                    'variants'      => VariantResource::collection($product->variants),
                ];
            }),
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray(request()));
    }
}
