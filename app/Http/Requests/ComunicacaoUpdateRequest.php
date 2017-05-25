<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunicacaoUpdateRequest extends FormRequest
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
            'dt_comunicacao' => 'required|date',
            'de_texto' => 'required:min:3',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'id_morador' => 'required|numeric',
            'de_email' => 'required|email',
        ];
    }
}
