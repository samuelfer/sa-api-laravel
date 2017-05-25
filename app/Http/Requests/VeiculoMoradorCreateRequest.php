<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoMoradorCreateRequest extends FormRequest
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
            'nu_placa' => 'required|max:7',
            'id_bloco' => 'numeric',
            'id_numero_imovel' => 'numeric',
            'id_pessoa' => 'numeric',
            'id_modelo_veiculo' => 'numeric',
            'de_vaga_veiculo' => 'max:50',
            'de_cadastro_veiculo_cidade' => 'max:50',
            'de_cadastro_veiculo_uf' => 'max:2',
            //'im_cadastro_veiculo_imagem' => 'mimes:jpeg,jpg,png',
            'de_linha' => 'max:30',
            'dt_linha' => 'date',
            'dt_fabricacao' => 'date',
            'de_cor' => 'required|max:30',
            'st_ativo' => 'required|max:1',
            'dt_inativacao' => 'date',
        ];
    }
}
