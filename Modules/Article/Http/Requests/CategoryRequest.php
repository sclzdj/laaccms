<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $category=$this->route('category');
        $id=$category?$category->id:null;
        return [
            'name' => 'required|min:2|max:30|unique:categories,name,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '栏目名称不能为空',
            'name.min' => '栏目名称长度最小2位',
            'name.max' => '栏目名称长度最大30位',
            'name.unique' => '栏目名称已存在',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
