<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderSuccessRequest extends FormRequest
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
        if (!Auth::check()) {
            return [
                'guest_name' => 'required',
                'guest_city' => 'required',
                'guest_email' => 'required|email|unique:users,email',
                'guest_telephone' => 'required',
                'pay_id' => 'required',
                'delivery_id' => 'required',
                'mail_number' => 'required'
            ];
        } else {
            return [];
        }
    }
}
