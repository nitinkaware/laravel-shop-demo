<?php

namespace App\Http\Requests;

use App\Address;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest {

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
            'pin_code' => ['required', 'digits_between:6,6'],
            'locality' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:100'],
            'name'     => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:100'],
            'address'  => ['required', 'max:150'],
            'mobile'   => ['required', 'digits_between:10,10'],
        ];
    }

    public function pinCode()
    {
        return $this->pin_code;
    }

    public function locality()
    {
        return $this->locality;
    }

    public function name()
    {
        return $this->name;
    }

    public function textAddress()
    {
        return $this->address;
    }

    public function mobile()
    {
        return $this->mobile;
    }

    public function isDefault()
    {
        return (bool) $this->is_default;
    }

    public function address()
    {
        $address = $this->user()->addresses()->find($this->route('address'));

        abort_if($address === null, response()->json([], 404));

        return $address;
    }

    public function messages()
    {
        return [
            'mobile.digits_between' => 'Mobile should be exactly 10 numbers.',
        ];
    }
}
