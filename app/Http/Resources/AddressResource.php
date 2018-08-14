<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource {

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
            'id'         => $this->id,
            'pin_code'   => $this->pin_code,
            'town'       => $this->town,
            'distinct'   => $this->distinct,
            'state'      => $this->state,
            'state_code' => $this->state_code,
            'name'       => $this->name,
            'address'    => $this->address,
            'mobile'     => $this->mobile,
            'is_default' => (bool) $this->is_default,
        ];
    }
}
