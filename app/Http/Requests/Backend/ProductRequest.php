<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'meta_description' => 'max:160',
            'meta_keyword' => 'max:160',
            'price' => 'required',
            'quantity' => 'required',
            'unit_id' => 'required',
        ];
    }

    function messages()
    {
        return [
          'name.required' => 'Please enter name',
        ];
    }
}
