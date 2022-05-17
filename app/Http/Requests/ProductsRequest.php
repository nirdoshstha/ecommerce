<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'category_id'       => 'required|integer',
            'subcategory_id'    => 'required|integer',
            'name'              => 'required|string|max:191',
            'slug'              => 'required|string|max:191|unique:products,slug,' .$this->id,
            'code'              => 'required|integer|min:1|unique:products,code,' .$this->id,
            'description'       =>'nullable|string|max:1000',
            'attribute_id'      =>'required|array',
            'attribute_id.*'    =>'required',
            'price'             =>'required|min:0',
        ];
    }




    public function messages()
    {
        return [
            'category_id.required'   => 'Please Select Category',
            'subcategory_id.required'   => 'Please Select Subcategory',

        ];
    }

}
