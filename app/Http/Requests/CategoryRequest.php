<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
            'name' => 'required|unique:categories,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => '系统错误，请返回重试',
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称已存在',
        ];
    }
}
