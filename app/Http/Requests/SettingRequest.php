<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
       $rules= [
            'name'          => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'email'         => 'required|string|max:255|email',
            'phone'         => 'required|integer',
            'value'         => 'required_if:shipping_type,0,1',
        ];
        // if(request('shipping_type')==0 || request('shipping_type')==1)
        // {
        //     $rules['value'] = 'required';
        // };

        return $rules;
    }
}
