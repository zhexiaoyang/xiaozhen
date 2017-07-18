<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NavRequest extends Request
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
            'name' => 'required|unique:navs,name,'.$this->id,
            'url' => 'required|unique:navs,url,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => '系统错误，请返回重试',
            'name.required' => '导航不能为空',
            'name.unique' => '导航已存在',
            'url.required' => '导航地址不能为空',
            'url.unique' => '导航地址已存在',
        ];
    }
}
