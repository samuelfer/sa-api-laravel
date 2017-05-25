<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaComumRequest extends FormRequest
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
            'id_area_pai' => 'required|numeric',
            //'id_tipo_area' => 'required|numeric',
            'de_cadastro_reserva_area_comum' => 'required|max:255',
            //'de_materiais' => '',
            'nu_valor' => 'required',
            //'hr_inicio' => 'required|time',
            //'hr_fim' => 'required|time',
            //'tmp_duracao' => 'required|numeric|min:1|max:2',
            //'st_horario_sn' => 'required|min:1|max:1',
            //'ignora_qtd_reserva' => 'required|min:1|max:1',
            //'nu_antecedencia_max' => 'required|numeric|min:1|max:2',
            //'nu_antecedencia_min' => 'required|numeric|min:1|max:2',
            //'qtd_reserva_mes' => 'required|numeric|min:1|max:2',
            //'perm_varias_reserva_dia' => 'required|numeric|min:1|max:1',
            //'qtd_reserva_mes_gratis' => 'required|numeric|min:1|max:2',
            //'qtd_reserva_ano_gratis' => 'required|numeric|min:1|max:3',
        ];
    }
}
