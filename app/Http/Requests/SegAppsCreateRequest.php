<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegAppsCreateRequest extends FormRequest
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
            'app_name' => 'required',
            'app_type' => 'required',
            'description' => 'required'
        ];
    }
}
