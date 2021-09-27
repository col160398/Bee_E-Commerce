<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
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
            'firstName'=>'required|max:150',
            'lastName'=>'required|max:150',
            'email'=>'required|email|unique:users',
            'phoneNumber'=>'required|min:9|max:11',
            'password'=>'required|min:6',
            're_password'=>'required|same:password'
        ];
    }
}
