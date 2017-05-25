<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class historicoVisitanteCreateRequest extends FormRequest
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
            'id_visitante' => 'required|numeric',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'dt_hr_historico' => 'required|date',
            'st_visita' => 'required|max:1',

        ];
    }
}
