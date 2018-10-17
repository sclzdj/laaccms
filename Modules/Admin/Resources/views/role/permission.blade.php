@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            【{{$role['title']}}】权限配置
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link" href="/admin/role">角色列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled active" href="#">权限配置</a>
            </li>
        @endslot
        @slot('body')
            <form action="/admin/role/permissionStore/{{$role['id']}}" method="post">
                @csrf
                @foreach($modules as $module)
                    <div class="card m-0">
                        @foreach($module['rules'] as $rules)
                            <div class="card-header">
                                <span style="font-size: 14px;">{{$rules['group']}}</span>
                            </div>
                            <div class="card-body">
                                @foreach($rules['permissions'] as $permission)
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input name="name[]" value="{{$permission['name']}}"
                                               {{$role->hasPermissionTo($permission['name'])?'checked':''}} class="custom-control-input"
                                               type="checkbox"><span
                                                class="custom-control-label">{{$permission['title']}}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection