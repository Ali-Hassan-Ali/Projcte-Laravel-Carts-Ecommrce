<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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

    public function rules()
    {
        return [
            'cart_name'         => 'required|min:2|max:150',
            'cart_name_en'      => 'required|min:2|max:150',
            'cart_text'         => 'required|min:2|max:150',
            'cart_text_en'      => 'required|min:2|max:150',
            'short_descript'    => 'required',
            'short_descript_en' => 'required',
            'sub_category_id'   => 'required',
            'amrecan_price'     => 'required',
            'image' => 'image'

            
        ];
    }

    public function messages()
    {
        return [
            'cart_name.required'         => trans('validation.required'),
            'cart_name_en.required'      => trans('validation.required'),
            'short_descript.required'    => trans('validation.required'),
            'short_descript_en.required' => trans('validation.required'),
            'cart_text.required'         => trans('validation.required'),
            'cart_text_en.required'      => trans('validation.required'),
            'sub_category_id.required'   => trans('validation.required'),
            'amrecan_price.required'     => trans('validation.required'),
            'image.image' => trans('validation.required'),

         
        ];
    }
}
