<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
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
            'id_area_comum' => 'required|numeric',
            //'id_area_pai' => 'required|numeric',
            //'id_tipo_area' => 'required|numeric',
            'dt_reserva' => 'required',
            'hr_inicio' => 'required',
            'hr_fim' => 'required',
            'nu_valor' => 'required',
            'status' => 'required',
            //'login' => 'required',
            'st_termo' => 'required|max:1',
            //'dt_hr_solicitacao' => 'required'
        ];
    }
}
