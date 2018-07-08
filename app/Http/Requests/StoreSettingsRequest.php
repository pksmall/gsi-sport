<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
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
            'settings.title' => 'required',
            'settings.title_ua' => 'required',
            'settings.title_en' => 'required',
            'settings.title_shop' => 'required',
            'settings.owner' => 'required',
            'settings.address' => 'required',
            'settings.address_ua' => 'required',
            'settings.address_en' => 'required',
            'settings.email' => 'required',
            'config.exchange_rate' => 'required|numeric',
            'config.item_limit' => 'required|numeric',
            'config.duration_new' => 'required|numeric',
            'config.item_desc_length' => 'required|numeric'
        ];
    }
}
