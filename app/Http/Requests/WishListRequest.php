<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WishListRequest extends FormRequest {

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'product_id' => ['required', Rule::exists('products', 'id')],
        ];
    }

    public function productId(): int
    {
        return $this->product_id;
    }
}
