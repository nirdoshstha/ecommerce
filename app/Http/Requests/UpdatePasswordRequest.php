<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => [ 'required','string', function($attribute,$value,$fail){
                if(! Hash::check($value, auth()->user()->password)){
                    $fail('old password didn\'t match.');
                }
            }],
            'new_password' => ['required', Password::min(8)->uncompromised()],
            'new_password_confirmation' => 'required|min:6|same:new_password',
        ];

    }

    public function messages()
    {
        return [
            '*.required' => 'Please enter :attribute',
        ];
    }
}
