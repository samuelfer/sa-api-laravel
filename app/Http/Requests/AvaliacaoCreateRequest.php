<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoCreateRequest extends FormRequest
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
            'nu_avaliacao' => 'required|numeric',
            'id_prestador' => 'required|numeric',
            'dt_avaliacao' => 'required|date',
            'observacao' => ''
        ];
    }
}
