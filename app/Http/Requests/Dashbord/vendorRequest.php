<?php

namespace App\Http\Requests\Dashbord;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
        return[

            'logo' => 'required_without:id|mimes:png,jpg,jpeg',
            'name' => 'required',
            'email' => 'required|email|unique:vendors,email,'.$this -> id,
            'mobile' => 'required|numeric|required_without:id|unique:vendors,mobile,'.$this -> id,
            'address' => 'required',
            'category_id' => 'required|exists:mainCategories,id',
            'vat_number' => 'max:13',
            'password' => 'required_without:id',
            'password_confirmation' => 'required_with:password_confirmation|same:password|required_without:id',


        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
