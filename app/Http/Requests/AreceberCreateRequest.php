<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreceberCreateRequest extends FormRequest
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
            'nu_documento' => 'required|numeric',
            'dt_pagamento' => 'required|date',
            'dt_vencimento' => 'required|date',
            'nu_juros' => 'required',
            'vl_multa' => 'required',
            'valor' => 'required',
            'vl_total' => 'required',
            'st_pago' => 'required|max:1'
        ];
    }
}
