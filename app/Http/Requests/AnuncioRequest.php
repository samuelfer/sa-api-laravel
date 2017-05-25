<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioRequest extends FormRequest
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
            'dt_anuncio' => 'required|date',
            'hr_anuncio' => 'required|time',
            'de_categoria' => 'required|min:5|max:255',
            'de_titulo_anuncio' => 'required|min:5|max:255',
            'de_anuncio' => 'required|min:5|max:255',
            'imagem' => 'mimes:jpeg,jpg,png',
            'nu_telefone' => 'required|min:11|max:11',
            'vl_anuncio' => '',
        ];
    }
}
