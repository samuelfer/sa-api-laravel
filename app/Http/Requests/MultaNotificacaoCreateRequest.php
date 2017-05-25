<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultaNotificacaoCreateRequest extends FormRequest
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
            'id_condominio' => 'required|numeric',
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'id_pessoa' => 'required|numeric',
            'id_tipo_multa_notificacao' => 'required|numeric',
            'de_multa_notificacao' => 'required|min:10',
            'dt_multa_notificacao' => 'required|date',
            'vl_multa_notificacao' => 'required',
            'st_liquidado' => 'required|max:1',
            'de_observacao' => 'min:10',
            'de_conduta' => 'min:10',
        ];
    }
}
