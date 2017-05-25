<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CondominioRequest extends FormRequest
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
            'no_condominio' => 'required|max:255',
            //'img_logo' => 'mimes:jpeg,jpg,png',
            'nu_cnpj' => 'required|max:16',
            'email_condominio' => 'required|email',
            'nu_cep_cond' => 'required|min:8|max:8',
            'de_logradouro_cond' => 'required|max:100',
            'de_complemento_cond' => '',
            'nu_numero_cond' => 'required|numeric',
            'de_bairro_cond' => 'required|max:80',
            'de_cidade_cond' => 'required|max:80',
            'de_uf_cond' => 'required|max:2',
            'de_observacao' => '',
            'de_site' => 'required|max:60',
            'id_administradora' => 'required|numeric',
        ];
    }
}
