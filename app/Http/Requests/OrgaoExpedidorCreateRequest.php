<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrgaoExpedidorCreateRequest extends FormRequest
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
            'de_orgao_expedidor' => 'required|max:70',
            'de_sigla' => 'required|max:6'
        ];
    }
}
