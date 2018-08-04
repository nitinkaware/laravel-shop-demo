<?php

namespace App\Http\Requests;

use App\Cart;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutCartQuantityRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quantity' => ['required', 'integer', 'between:1,5'],
        ];
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function cart()
    {
        $cart = $this->user()->carts()->find($this->route('cart'));

        abort_if($cart === null, response()->json([], 404));

        return $cart;
    }
}
