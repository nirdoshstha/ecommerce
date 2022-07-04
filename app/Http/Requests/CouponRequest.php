<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'title'         => 'required|string|max:191',
            'code'          => 'required|string|max:191|unique:coupons,code,' .$this->id,
            'start_date'    => 'required|date|date_format:Y-m-d',
            'expire_date'    => 'required|date|date_format:Y-m-d',

        ];
    }
}
