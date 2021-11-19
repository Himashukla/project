<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email,' . \Request::get('id'),
            'password' => 'required',
            'city_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'city_id.required' => 'Please select any one city.',
        ];
    }
}
