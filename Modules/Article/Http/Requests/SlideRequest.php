<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    //验证规则
    public function rules()
    {
        return [
            'title'  => 'required',
            'url'    => 'required',
            'pic'    => 'required',
            'status' => 'required',
        ];
    }

    //错误信息处理
    public function messages()
    {
        return [
            'title.required'  => '轮播图标题不能为空',
            'url.required'    => '轮播图链接地址不能为空',
            'pic.required'    => '轮播图图片不能为空',
            'status.required' => '轮播图状态不能为空',
        ];
    }

    //权限验证
    public function authorize()
    {
        return true;
    }
}
