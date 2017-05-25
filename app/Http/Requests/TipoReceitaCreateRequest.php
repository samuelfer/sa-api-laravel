<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoReceitaCreateRequest extends FormRequest
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
            'de_tipo_receita' => 'required|max:30'
        ];
    }
}
