<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequests extends FormRequest
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
            'cart_name'         => 'required|min:2|max:150',
            'cart_name_en'      => 'required|min:2|max:150',
            'cart_code'         => 'required',
            'products_id'       => 'required',
            
        ];
    }

     public function messages()
    {
        return [
            'cart_name.required'         => trans('validation.required'),
            'cart_name_en.required'      => trans('validation.required'),
            'cart_code.required'         => trans('validation.required'),
            'products_id.required'       => trans('validation.required'),
         
        ];
    }

}
