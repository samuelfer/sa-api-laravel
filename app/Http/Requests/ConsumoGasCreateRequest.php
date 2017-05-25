<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumoGasCreateRequest extends FormRequest
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
            'dt_lancamento' => 'required|date',
            'dt_leitura' => 'required|date',
            'coeficiente' => 'required',
            'vl_quilo' => 'required',
            'vl_taxa' => 'required',
            'mes_ano' => 'required',
            'id_condominio' => 'required|numeric'
        ];
    }
}
