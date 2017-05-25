<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaCreateRequest extends FormRequest
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
            'id_tipo_pessoa' => 'required',
            'id_condominio' => 'required',
            'dt_cadastro' => 'required|date',
            'de_pessoa' => 'required',
            //'img_pessoa' => 'numeric',
            'dt_nascimento' => 'required',
            'nu_telefone' => 'max:11',
            'nu_celular' => 'max:11',
            'nu_cpf_cnpf' => 'required',
            'de_email' => 'required',
            'nu_rg' => 'required',
            'nu_cep' => 'required',
            'de_bairro' => 'required',
            'de_cidade' => 'required',
            'nu_logradouro' => 'required',
            'de_logradouro' => 'required',
            'de_complemento' => 'required',
            'de_uf' => 'max:2',
            'de_observacao' => 'min:5'
        ];
    }
}
