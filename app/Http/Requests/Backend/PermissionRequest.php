<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'route' => 'required',
            'module_id' => 'required',




        ];
    }
    function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'route.required' => 'Please Enter Route',
            'module_id.required' => 'Please Enter Module',


        ];
    }
}
