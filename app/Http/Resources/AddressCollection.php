<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection {

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
            'data' => $this->collection->transform(function ($address) {


                return [
                    'id'         => $address->id,
                    'pin_code'   => $address->pin_code,
                    'town'       => $address->town,
                    'distinct'   => $address->distinct,
                    'state'      => $address->state,
                    'state_code' => $address->state_code,
                    'name'       => $address->name,
                    'address'    => $address->address,
                    'mobile'     => $address->mobile,
                    'is_default' => (bool) $address->is_default,
                ];
            }),
        ];
    }
}
