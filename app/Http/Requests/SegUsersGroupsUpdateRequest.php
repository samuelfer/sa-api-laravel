<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegUsersGroupsUpdateRequest extends FormRequest
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
            'login' => 'required',
            'user_id' => 'required',
            'group_id' => 'required',
        ];
    }
}
