<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChavesCreateRequest extends FormRequest
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
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'id_tipo_chave' => 'required|numeric',
            'id_morador' => 'required|numeric',
            'dt_hr_entrada_chaves' => 'required',
            'dt_hr_saida_chaves' => 'required',
            //'de_observacao' => '',
        ];
    }
}
