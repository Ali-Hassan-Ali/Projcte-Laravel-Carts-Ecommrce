<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConnectRequests extends FormRequest
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
            'name'       => 'required|min:2|max:150',
            'email'      => 'required',
            'subject'    => 'required',
            'message'    => 'required',
            
        ];
    }

     public function messages()
    {
        return [
            'name.required'     => trans('validation.required'),
            'email.required'    => trans('validation.required'),
            'subject.required'  => trans('validation.required'),
            'message.required'  => trans('validation.required'),
         
        ];
    }

}
