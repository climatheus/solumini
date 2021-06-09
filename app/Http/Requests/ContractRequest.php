<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'company_id'    => 'required',
            'company_owner' => 'required|min:3|max:250',
            'seller_name'   => 'required|min:3|max:250',
            'expire_date'   => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'company_id.required'       => 'O campo Empresa é obrigatório.',
            'company_owner.required'    => 'O campo Dono da Empresa é obrigatório.',
            'seller_name.required'      => 'O campo Nome do Vendedor é obrigatório.',
            'expire_date.required'      => 'O campo Valido Até é obrigatório.',
        ];
    }
}
