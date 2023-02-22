<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.exists' => 'Email does not exist',
            'password.required' => 'Password is required.',
            'password.regex'=>'Password must be at least 8 characters, contain at least 1 lowercase, at least 1 uppercase letter, special character, and at least 1 digit.'
        ];
    }
}
