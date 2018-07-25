<?php

namespace App\Http\Requests;

use App\Product;
use App\Variant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class CartRequest extends FormRequest {

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
        $rules = [
            'product_id' => ['required', Rule::exists('products', 'id')],
        ];

        $variants = $this->getVariants();

        $sizes = $this->getSize($variants);

        $colors = $this->colorSize($variants);

        if ($sizes->isNotEmpty()) {
            $rules['size_id'] = ['required', Rule::in($sizes->toArray())];
        }

        $rules['color_id'] = ['required', Rule::in($colors->toArray())];

        return $rules;
    }

    private function getVariants()
    {
        return Variant::whereHas('product', function ($query) {
            $query->where('product_id', $this->product_id);
        })->get();
    }

    private function getSize($variants)
    {
        /** @var Collection $variants */
        return $variants->filter(function ($variant) {
            return ! !$variant->size;
        })->pluck('id');
    }

    private function colorSize($variants)
    {
        return $variants->filter(function ($variant) {
            return ! !$variant->color;
        })->pluck('id');
    }

    public function product()
    {
        return Product::find($this->product_id);
    }

    public function sizeId()
    {
        return $this->size_id;
    }

    public function colorId()
    {
        return $this->color_id;
    }
}
