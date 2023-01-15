<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'from'=>'max:18|nullable|alpha',
            'age'=>'integer|max:499|nullable',
        ];
    }

//    public function messages()
//    {
//        return [
//            'alpha'=>'Please :attribute must be a letters',
//            'numeric'=>'Please :attribute must be integer',
//            'age.max'=>'maximum number of characters 4 '
//        ];
//    }
}
