<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class apagarCreateRequest extends FormRequest
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
            'id_fornecedor' => 'required|numeric',
            'id_tipo_documento' => 'required|numeric',
            'dt_data' => 'required|date',
            'nu_documento' => 'required|numeric',
            'dt_vencimento' => 'required|date',
            'nu_valor' => 'required',
            'nu_jurus' => 'required',
            'nu_multa' => 'required',
            'nu_valor_pago' => '',
            'st_liquidado' => 'required|max:1'
        ];
    }
}
