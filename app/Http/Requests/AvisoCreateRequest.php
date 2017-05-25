<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvisoCreateRequest extends FormRequest
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
            'dt_aviso' => 'required|date',
            'de_aviso' => 'required|min:10',
            'arq_aviso' => '',
        ];
    }
}
