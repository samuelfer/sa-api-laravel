<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaCompromissoRequest extends FormRequest
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
            'dt_cadastro' => 'required|date',
            'dt_agenda' => 'required|date',
            'st_notificacao' => 'required|max:1',
            'de_responsavel' => 'required|min:5|max:255',
            'de_titulo_tarefa' => 'required|min:5|max:255',
            'de_tarefa' => 'required',
            'st_status' => 'required|max:1',
            'nu_qtde_dias' => 'required|numeric|max:2',
            'de_acao' => '',

        ];
    }
}
