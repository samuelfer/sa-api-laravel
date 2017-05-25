<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegGroupsAppsCreateRequest extends FormRequest
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
            'group_id' => 'required|numeric',
            'seg_apps_id' => 'required|numeric',
            'priv_access' => 'required|max:1',
            'priv_insert' => 'required|max:1',
            'priv_delete' => 'required|max:1',
            'priv_update' => 'required|max:1',
            'priv_export' => 'required|max:1',
            'priv_print' => 'required|max:1',
        ];
    }
}
