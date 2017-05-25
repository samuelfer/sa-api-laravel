<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentoCreateRequest extends FormRequest
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
            'nu_conta' => 'required|numeric',
            'nu_agencia' => 'required|numeric',
            'id_fornecedor' => 'required|numeric',
            'id_tipo_documento' => 'required|numeric',
            'id_tipo_movimento' => 'required|numeric',
            'dt_movimento' => 'required|date',
            'nu_documento' => 'required|numeric',
            'vl_movimento' => '',
        ];
    }
}
