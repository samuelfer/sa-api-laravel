<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaragemCreateRequest extends FormRequest
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
            'de_imagem' => 'mimes:jpeg,jpg,png'
        ];
    }
}
