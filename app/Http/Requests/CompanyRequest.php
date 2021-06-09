<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name'          => 'required|min:3|max:250',
            'category_id'   => 'required',
            'address'       => 'required|min:3|max:250',
            'city'          => 'required|min:3|max:100',
            'state'         => 'required|min:2|max:2',
            'description'   => 'required',
            'number'        => 'required|array|min:1',
            'number.0'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'  => 'O campo categoria é obrigatório.',
            'number.0.required'     => 'O Telefone Principal é obrigatório.'
        ];
    }
}
