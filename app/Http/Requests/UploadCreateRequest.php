<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadCreateRequest extends FormRequest
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
            'id_tipo_upload' => 'required',
            'dt_upload' => 'required|date',
            'arquivo' => 'required|max:100',
            'de_descricao' => 'required|max:100',
            'permissao' => 'required|max:1',
        ];
    }
}
