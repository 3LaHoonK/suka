<?php

namespace App\Http\Requests\Dashbord;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
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
            'name'=>'required|string|max:100',
            'locale'=>'required|max:10',
            'direction'=>'required|in:rtl,ltr',
            'abbr'=>'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'sould input name',
            'name.string'=>'should be string',
            'direction'=>'chosse the direcate',
            'direction.required'=>'chosse the direcate',
            'abbr.max'=>'a very many of string',
        ];
    }
}
