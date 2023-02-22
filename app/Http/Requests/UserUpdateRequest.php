<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'image' => 'image|max:2000|mimes:jpg,png,jpeg',
            'gameroles' => 'required|exists:game_roles,id'
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required.',
            'image' => 'Uploaded file must be .jpg/.jpeg or .png',
            'image.image' => 'Uploaded file must be an image.',
            'image.max' => 'Uploaded file must not be larger than :max kilobytes.',
            'gameroles.exists' => 'Selected role does not exist.'
        ];
    }
}
