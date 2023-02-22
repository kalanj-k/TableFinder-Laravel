<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users,username|alpha_num|min:4|max:20',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Username required.',
            'username.unique'=>'Username must be unique.',
            'username.aplhanumeric' => 'Username can contain only letters and numbers.',
            'username.min'=>'Username cannot be shorter than 4 characters.',
            'username.max'=>'Username cannot be longer than 20 characters.',
            'email.required' => 'Email required.',
            'email.unique' => 'Email must be unique.',
            'password.required'=>'Password required.',
            'password.confirmed'=>'Passwords do not match.',
            'password.regex'=>'Password must be at least 8 characters, contain at least 1 lowercase, at least 1 uppercase letter, special character, and at least 1 digit.'
        ];
    }
}
