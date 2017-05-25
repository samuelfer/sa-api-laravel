<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaleConoscoCreateRequest extends FormRequest
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
            //'dt_mensagem' => 'required|date',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            //'id_tipo_fale_conosco' => 'required|numeric',
            'email' => 'required|email',
            'de_mensagem' => 'required|min:10',
            //'st_visto' => 'required|max:1',
            'feedback' => '',
            'telefone' => 'required|min:11|max:11',
            //'st_ticket' => 'required|max:1',
            'dt_ultima_mensagem' => '',
        ];
    }
}
