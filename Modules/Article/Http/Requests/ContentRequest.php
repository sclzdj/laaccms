<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    //验证规则
    public function rules()
    {
        return array(
            'title'=>'required|min:1|max:100',
            'category_id'=>'required',
            'author'=>'nullable|min:1|max:100',
            'content'=>'required',
        );
    }

    //错误信息处理
    public function messages()
    {
        return array(
            'title.required' => '文章标题不能为空',
            'title.min' => '文章标题长度最小1位',
            'title.max' => '文章标题长度最大100位',
            'category_id.required' => '文章栏目不能为空',
            'author.min' => '文章作者长度最小1位',
            'author.max' => '文章作者长度最大100位',
            'content.required' => '文章内容不能为空',
        );
    }

    //权限验证
    public function authorize()
    {
        return true;
    }
}
