<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'max:60|required',
            'cont'=>'required',
            'ps'=>'max:150'
        ];
    }

    public function messages()
    {
        return [
            'title.max'=>'Max characters is 60',
            'ps.max'=>'Max characters is 150',
            'cont.required'=>"Content field is required",

        ];
    }
}
