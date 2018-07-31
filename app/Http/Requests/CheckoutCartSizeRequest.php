<?php

namespace App\Http\Requests;

use App\Cart;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutCartSizeRequest extends FormRequest {

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
            'size_id' => ['required', Rule::exists('variants', 'id')->where(function (Builder $query) {
                $query->whereExists(function (Builder $query) {
                    $query->select(\DB::raw(1))
                        ->from('variants')
                        ->join('products', 'products.id', '=', 'variants.product_id')
                        ->join('carts', 'products.id', '=', 'carts.product_id')
                        ->where('carts.id', $this->route('cart'));
                });
            })],
        ];
    }

    public function size()
    {
        return $this->size_id;
    }

    public function cart()
    {
        $cart = Cart::find($this->route('cart'));

        abort_if($cart === null, response()->json([], 404));

        return $cart;
    }
}
