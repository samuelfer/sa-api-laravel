<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchadosPerdidosRequest extends FormRequest
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
            'id_bloco' => 'required|numeric',
            'id_numero_imovel' => 'required|numeric',
            'de_local' => 'required|min:5|max:255',
            'de_item' => 'required|min:2|max:255',
            'dt_achados_perdidos' => 'required|date',
            //'img_item' => 'mimes:jpeg,jpg,png',
            'st_item' => 'required|max:1',
            'de_perdeu' => '',
            'id_funcionario' => '',
            'id_morador' => '',
            'st_entregue' => 'required|max:1',
            'dt_entrega' => '',
            'hr_entrega' => '',
        ];
    }
}
