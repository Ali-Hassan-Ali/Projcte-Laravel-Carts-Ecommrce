<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
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
            'name'              => 'required',
            'name_en'           => 'required',
            'image'             => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => trans('validation.required'),
            'name_en.required' => trans('validation.required'),

        ];
    }
}
