<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegLogCreateRequest extends FormRequest
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
            'inserted_date' => 'required|date',
            'username' => 'required',
            'application' => 'required',
            'creator' => 'required',
            'ip_user' => 'required',
            'action' => 'required',
            'description' => 'required'
        ];
    }
}
