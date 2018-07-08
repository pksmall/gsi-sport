<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressDeliveryRequest extends FormRequest
{
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
            'delivery_country' => 'required',
            'delivery_region' => 'required',
            'delivery_city' => 'required',
            'delivery_address' => 'required',
            'delivery_zipcode' => 'required',
            'delivery_id' => 'required'
        ];
    }
}
