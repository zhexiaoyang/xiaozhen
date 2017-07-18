<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
            'id' => 'numeric',
            'name' => 'required|unique:permissions,name,'.$this->id,
            'display_name' => 'required|unique:permissions,display_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => '系统错误，请返回重试',
            'name.required' => '权限名称不能为空',
            'name.unique' => '权限名称已存在',
            'display_name.required' => '权限标题不能为空',
            'display_name.unique' => '权限标题已存在',
        ];
    }
}
