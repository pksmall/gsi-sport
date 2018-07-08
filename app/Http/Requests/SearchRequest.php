<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        $this->sanitize();
        return [
            'search' => 'required|min:2'
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

//        if (preg_match("#https?://#", $input['url']) === 0) {
//            $input['url'] = 'http://'.$input['url'];
//        }

        $input['search'] = filter_var($input['search'], FILTER_SANITIZE_STRING);

        $this->replace($input);
    }
}
