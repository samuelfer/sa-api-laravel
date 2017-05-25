<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestadorServicoCreateRequest extends FormRequest
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
            'id_tipo_servico' => 'required|numeric',
            'id_pessoa' => 'required|numeric',
            'id_banco' => 'required|numeric',
            'nu_agencia' => 'required|numeric',
            'nu_conta' => 'required|numeric',
            'id_tipo_conta' => 'required|numeric',
            'nu_operacao' => 'required|numeric',
            'media' => 'required',
            'st_ativo' => 'required|max:1',
            'permissao' => 'required|max:1',
        ];
    }
}
