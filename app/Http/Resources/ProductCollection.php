<?php

namespace App\Http\Resources;

use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection {

    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($product) {

                return [
                    'id'       => $product->id,
                    'name'     => $product->name,
                    'tax'      => new TaxResource($product->tax),
                    'category' => new CategoryResource($product->category),
                    'variants' => VariantResource::collection($product->variants),
                ];
            }),
        ];
    }
}
