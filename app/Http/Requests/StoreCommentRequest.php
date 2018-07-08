<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCommentRequest extends FormRequest
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
        if (Auth::check()) {
            return [
                'comment.message' => 'required|min:3',
                'comment.rating' => 'required'
            ];
        } else {
            return [
                'comment.username' => 'required',
                'comment.email' => 'required|email',
                'comment.telephone' => 'required|min:6',
                'comment.message' => 'required|min:3',
                'comment.rating' => 'required'
            ];
        }
    }
}
