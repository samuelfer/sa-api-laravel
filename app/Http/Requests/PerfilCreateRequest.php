<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilCreateRequest extends FormRequest
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
            'id_pessoa' => 'required|numeric',
            'id_tipo_perfil' => 'required|numeric',
            'dt_inicio' => 'required|date',
            'dt_fim' => 'required|date',
            'st_status' => 'required|max:1',
        ];
    }
}
