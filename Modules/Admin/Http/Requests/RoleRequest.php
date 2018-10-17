<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $role=$this->route('role');
        $id=$role?$role->id:null;
        return [
            'title' => 'required|min:2|max:30|unique:roles,title,'.$id,
            'name' => 'required|min:2|max:30|unique:roles,name,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '角色名称不能为空',
            'title.min' => '角色名称长度最小2位',
            'title.max' => '角色名称长度最大30位',
            'title.unique' => '角色名称已存在',
            'name.required' => '角色标识不能为空',
            'name.min' => '角色标识长度最小2位',
            'name.max' => '角色标识长度最大30位',
            'name.unique' => '角色标识已存在',
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
