<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalCreateRequest extends FormRequest
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
            'id_raca' => 'required|numeric',
            'id_especie' => 'required|numeric',
            //'img_animal' => 'mimes:jpeg,jpg,png',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'st_vacinado' => 'required|max:1',
            'id_pessoa' => 'required|numeric',
        ];
    }
}
