<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class imovelRequest extends FormRequest
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
            'id_numero_imovel' => 'required|numeric',
            'id_bloco' => 'required|numeric',
            //'id_bloco' => 'required|exists:categories,id_bloco',
            'id_tipo_situacao' => 'required|numeric',
            'de_metragem_imovel' => '',
            'de_observacao_imovel' => '',
            'id_proprietario' => 'required|numeric',
            'usuario' => 'required',

        ];
    }
}
