<?php

namespace App\Http\Requests\Dashbord;

use Illuminate\Foundation\Http\FormRequest;

class SubCagegoriesRequest extends FormRequest
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
            // 'image' => 'mimes:png,jpg,jpeg',
            'category' => 'array|min:1',
            'category.*.name' => 'required',
            'category.*.slug' => 'required',

        ];
    }
    public function messages()
    {
        return[


            'category.0.name.required' => 'The name of arabic field is required.',
            'category.0.slug.required' => 'The name of arabic field is required.',

            // en
            'category.1.name.required' => 'The name of arabic field is required.',
            'category.1.slug.required' => 'The name of arabic field is required.',

        ];
    }
}
