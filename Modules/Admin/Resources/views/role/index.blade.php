@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            角色列表
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="/admin/role">角色列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#roleModal">添加角色</a>
            </li>
            @component('components.modal',['modalId'=>'roleModal','modalTitle'=>'添加角色','submitUrl'=>'/admin/role','submitText'=>'确定'])
                <div class="form-group">
                    <label for="exampleInputEmail1">角色名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="角色名称" name="title"
                           value="{{old('title')}}">
                    <small id="emailHelp" class="form-text text-muted">必填，长度2-30位</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">角色标识</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="角色标识" name="name"
                           value="{{old('name')}}">
                    <small id="emailHelp" class="form-text text-muted">必填，长度2-30位</small>
                </div>
            @endcomponent
        @endslot
        @slot('body')
            <p class="card-text">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名称</th>
                    <th scope="col">标识</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$role['id']}}</th>
                        <td>{{$role['title']}}</td>
                        <td>{{$role['name']}}</td>
                        <td>{{$role['created_at']}}</td>
                        <td>
                            <div class="btn-group btn-space">
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#editRoleModal{{$role['id']}}">编辑
                                </button>
                                <a href="/admin/role/permission/{{$role['id']}}" class="btn btn-secondary">权限</a>
                                <button type="button" class="btn btn-secondary" onclick="roleDestroy(this)">删除</button>
                                <form action="/admin/role/{{$role['id']}}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                            @component('components.modal',['modalId'=>"editRoleModal{$role['id']}",'modalTitle'=>'编辑角色','submitMethod'=>'PUT','submitUrl'=>"/admin/role/{$role['id']}",'submitText'=>'保存'])
                                <div class="form-group">
                                    <label for="exampleInputEmail1">角色名称</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="角色名称"
                                           name="title"
                                           value="{{$role['title']}}">
                                    <small id="emailHelp" class="form-text text-muted">必填，长度2-30位</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">角色标识</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                           placeholder="角色标识" name="name"
                                           value="{{$role['name']}}">
                                    <small id="emailHelp" class="form-text text-muted">必填，长度2-30位</small>
                                </div>
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
            {{$roles->links()}}
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function roleDestroy(fn){
            if(confirm('确定删除角色？')){
                $(fn).next('form').trigger('submit');
            }
        }
    </script>
@endsection