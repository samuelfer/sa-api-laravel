<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OcorrenciaMoradorCreateRequest extends FormRequest
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
            'id_morador' => 'required|numeric',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'id_tipo_ocorrencia' => 'required|numeric',
            'dt_hr_ocorrencia' => 'required|date',
            'de_ocorrencia' => 'required|min:10',
            'img_ocorrencia' => 'mimes:jpeg,jpg,png',
            'nu_placa' => 'required|max:6',
            'de_marca_modelo' => 'required',
            'st_visto' => 'required|max:1',

        ];
    }
}
