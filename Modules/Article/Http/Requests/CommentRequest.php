<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    //验证规则
    public function rules()
    {
        return [
            'content'=>'required',
        ];
    }
    
    //错误信息处理
    public function messages()
    {
        return [
            'content.required'=>'评论内容不能为空',
        ];
    }
    
    //权限验证
    public function authorize()
    {
        return true;
    }
}
