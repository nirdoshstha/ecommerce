<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBasicInfoRequest extends FormRequest
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
            'phone'             => 'required|numeric|min:15',
            'address'           => 'nullable|string|max:191',
            'dob'               => 'nullable|date',
        ];

    }

    public function messages()
    {
        return [
            '*.required' => 'Please enter :attribute',
        ];
    }
}
