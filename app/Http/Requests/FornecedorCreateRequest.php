<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorCreateRequest extends FormRequest
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
            'dt_cadastro' => 'required|date',
            'de_razao_social' => 'required|min:2|max:100',
        ];
    }
}
