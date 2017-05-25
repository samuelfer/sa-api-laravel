<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class historicoCreateRequest extends FormRequest
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
            'id_tipo_pessoa' => 'required|numeric',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'dt_entrada' => 'required|date',
            'dt_inativacao' => 'date',
        ];
    }
}
