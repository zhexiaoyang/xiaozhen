<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
            'name' => 'required|unique:roles,name,'.$this->id,
            'display_name' => 'required|unique:roles,display_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => '系统错误，请返回重试',
            'name.required' => '角色名称不能为空',
            'name.unique' => '角色名称已存在',
            'display_name.required' => '角色标题不能为空',
            'display_name.unique' => '角色标题已存在',
        ];
    }
}
