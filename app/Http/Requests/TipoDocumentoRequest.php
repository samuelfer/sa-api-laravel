<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipoDocumentoRequest extends FormRequest
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
            'de_tipo_documento' => 'required|max:30'
        ];
    }
}
