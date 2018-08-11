<?php

namespace App\Http\Requests;

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
            'pin_code' => ['required', 'min:6', 'max:6'],
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

    public function address()
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
}
