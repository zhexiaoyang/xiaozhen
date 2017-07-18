<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserPostRequest extends Request
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
        $rules = [
            'id' => 'numeric',
            'name' => 'required|unique:admins,name,'.$this->id,
            'email' => 'required|email|unique:admins,email,'.$this->id,
            'status' => 'required',
        ];
        if ($this->method() == 'POST')
        {
            $rules['password'] = 'required|min:6|max:18';
            $rules['password_confirmation'] = 'required|same:password';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'id.numeric' => '系统错误，请返回重试',
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已存在',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'email.unique' => '邮箱已存在',
            'password.required' => '密码不能为空',
            'password_confirmation.required' => '确认密码不能为空',
            'password_confirmation.same' => '确认密码与密码不一致',
            'status.required' => '状态不能为空',
            'password.min' => '密码长度在6-18之间',
            'password.max' => '密码长度在6-18之间',
        ];
    }
}
