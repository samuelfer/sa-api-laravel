<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorrespondenciaCreateRequest extends FormRequest
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
            'de_remetente' => 'required|min:5|max:100',
            'dt_hr_chegada' => 'required',
            'dt_hr_entrega' => 'required',
            'de_recebedor' => '',
            'st_entregue' => 'required|max:1',
            'de_observacao' => '',
        ];
    }
}
