<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategory extends FormRequest
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
            'name'               => 'required',
            'name_en'            => 'required',
            'parent_category_id' => 'required',
            'image' => 'image',
            'color1' => 'required',
            'color2' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'               => trans('validation.required'),
            'name_en.required'            => trans('validation.required'),
            'parent_category_id.required' => trans('validation.required'),
            'image.required'              => trans('validation.required'),
            'color1.required'             => trans('validation.required'),
            'color2.required'             => trans('validation.required'),
            
        ];
    }
}
