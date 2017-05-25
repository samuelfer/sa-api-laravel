<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefoneCreateRequest extends FormRequest
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
            'id_proprietario' => 'required|numeric',
            'nu_telefone' => 'required|numeric|max:11',
        ];
    }
}
