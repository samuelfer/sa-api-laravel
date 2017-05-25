<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultaVeiculoCreateRequest extends FormRequest
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
            'id_multa_notificacao' => 'required|numeric',
            'dt_hr_trava' => 'required|date',
            'nu_placa' => 'required|max:6',
        ];
    }
}
