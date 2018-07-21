<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'is_wish_listed' => $this->isWishListed(auth()->user()),
            'tax'            => new TaxResource($this->tax),
            'statistics'     => new ProductStatisticsResource($this->statistics),
            'variants'       => VariantResource::collection($this->variants),
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray(request()));
    }
}
