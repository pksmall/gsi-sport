<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'item.user_id' => 'required|numeric',
            'item.item_id' => 'required|numeric',
            'item.review' => 'required',
            'item.rating' => 'required',
            'item.locale' => 'required'
        ];
    }
}
