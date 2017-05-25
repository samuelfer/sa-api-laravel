<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeituraGasCreateRequest extends FormRequest
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
            'id_consumo' => 'required|numeric',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'vl_leitura' => '',
            'vl_consumo_kg' => '',
            'vl_consumo' => '',
            'vl_total' => '',
            'dt_leitura' => 'required|date',
        ];
    }
}
