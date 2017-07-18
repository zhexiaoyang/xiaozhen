<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required|unique:articles,title,'.$this->id,
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => '系统错误，请返回重试',
            'title.required' => '文章标题不能为空',
            'title.unique' => '文章标题已存在',
            'content.required' => '文章内容不能为空'
        ];
    }
}
