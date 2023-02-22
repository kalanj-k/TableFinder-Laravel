<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableUpdateRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'image|max:2000|mimes:jpg,png,jpeg',
            'days' => 'required|exists:days,id',
            'gm' => 'required',
            'gsys'=> 'required|exists:game_systems,id',
            'level' => 'required|exists:levels,id'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Name is required.',
            'image' => 'Uploaded file must be .jpg/.jpeg or .png',
            'image.image' => 'Uploaded file must be an image.',
            'image.max' => 'Uploaded file must not be larger than :max kilobytes.',
            'days.exists' => 'The selected day does not exist.',
            'days.required' => 'Days required.',
            'gsys.required' => 'Game system is required.',
            'gsys.exists' => 'Game system is required.',
            'level.required' => 'Level is required.'
        ];
    }
}
