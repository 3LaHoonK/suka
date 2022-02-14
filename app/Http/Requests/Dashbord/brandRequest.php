<?php

namespace App\Http\Requests\Dashbord;

use Illuminate\Foundation\Http\FormRequest;

class brandRequest extends FormRequest
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
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'brand' => 'array|min:1',
            'brand.*.name' => 'required',
            'brand.*.description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'brand.0.name.required' => 'The name of arabic field is required.',
            'brand.1.name.required' => 'The name of arabic field is required.',
        ];
    }

}
