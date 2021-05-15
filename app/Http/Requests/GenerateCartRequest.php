<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateCartRequest extends FormRequest
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
            'cart_name'       => 'required',
            'cart_name_en'    => 'required',
            'cart_text'       => 'required',
            'cart_text_en'    => 'required',
            'market_id'       => 'required',
            'sub_category_id' => 'required',
            
            'amrecan_price'   => 'required',
         
        ];
    }

    public function messages()
    {
        return [
            'cart_name.required'       => trans('validation.required'),
            'cart_name_en.required'    => trans('validation.required'),
            'cart_text.required'       => trans('validation.required'),
            'cart_text_en.required'    => trans('validation.required'),
            'market_id.required'       => trans('validation.required'),
            'sub_category_id.required' => trans('validation.required'),
          
            'amrecan_price.required'   => trans('validation.required'),
          
        ];
    }
}
