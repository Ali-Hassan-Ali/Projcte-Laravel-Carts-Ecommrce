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
        $rules = [
            'cart_details_id' => 'required',
            // 'market_id'       => 'required',
            'sub_category_id' => 'required',
            'balance'       => 'required',
            'stars'         => 'required',
            'amrecan_price' => 'required',
            // 'quantity'      => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            // 'cart_name.required'         => trans('validation.required'),
            // 'cart_name_en.required'      => trans('validation.required'),
            // 'short_descript.required'    => trans('validation.required'),
            // 'short_descript_en.required' => trans('validation.required'),
            // 'cart_text.required'         => trans('validation.required'),
            // 'cart_text_en.required'      => trans('validation.required'),
            // 'sub_category_id.required'   => trans('validation.required'),
            // 'amrecan_price.required'     => trans('validation.required'),        
        ];
    }
}
