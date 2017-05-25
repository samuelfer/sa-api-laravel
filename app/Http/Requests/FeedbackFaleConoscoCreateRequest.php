<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackFaleConoscoCreateRequest extends FormRequest
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
            'id_fale_conosco' => 'required|numeric',
            'de_mensagem' => 'required|min:10',
            'login' => 'required',
            'dt_mensagem' => 'required|date',
        ];
    }
}
