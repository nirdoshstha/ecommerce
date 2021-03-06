<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            'category_id'   => 'required|integer',
            'name'          => 'required|string|max:191',
            'slug'          => 'required|string|max:191|unique:categories,slug,' .$this->id,
            'rank'          => 'required|integer|min:1|unique:categories,rank,' .$this->id,
            // 'image_field'   => 'nullable|image',
            'image_field'   => 'nullable|max:500',
            'description'   =>'required|string|max:1000',
        ];
    }




    public function messages()
    {
        return [
            'category_id.required'   => 'Please Select Category',
        ];
    }

}
