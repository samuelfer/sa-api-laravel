<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class visitanteCreateRequest extends FormRequest
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
            'id_tipo_visitante' => 'required|numeric',
            'img_visitante' => 'mimes:jpeg,jpg,png',
            'nu_rg' => 'numeric',
            'nu_cpf' => 'numeric',
        ];
    }
}
