<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaCorrenteCreateRequest extends FormRequest
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
            'nu_agencia' => 'required|numeric',
            'id_banco' => 'required|numeric',
            'id_condominio' => 'required|numeric',
            'id_tipo_conta' => 'required|numeric',
            'nu_valor' => '',
        ];
    }
}
