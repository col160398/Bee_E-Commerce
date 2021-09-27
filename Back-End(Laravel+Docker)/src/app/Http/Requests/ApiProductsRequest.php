<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiProductsRequest extends FormRequest
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
            'name'=>'required|max:500',
            'id_categories'=>'required',
            'image'=>'required',
            'description'=>'required',
            'unit_price'=>'required',
            'promotion_price'=>'',
            'quantity'=>'required',
            'view'=>'required'
        ];
    }
}
