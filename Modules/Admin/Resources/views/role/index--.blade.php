@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs">
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
            </ul>
        </div>
        <div class="card-header">
            角色列表
        </div>
        <div class="card-body">
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
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editRoleModal{{$role['id']}}">编辑</button>
                                <a href="/admin/role/permission/{{$role['id']}}" class="btn btn-secondary">权限</a>
                                <button type="button" class="btn btn-secondary">删除</button>
                            </div>
                            @component('components.modal',['modalId'=>"editRoleModal{$role['id']}",'modalTitle'=>'编辑角色','submitMethod'=>'PUT','submitUrl'=>"/admin/role/{$role['id']}",'submitText'=>'保存'])
                                <div class="form-group">
                                    <label for="exampleInputEmail1">角色名称</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="角色名称" name="title"
                                           value="{{$role['title']}}">
                                    <small id="emailHelp" class="form-text text-muted">必填，长度2-30位</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">角色标识</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="角色标识" name="name"
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
        </div>
    </div>
@endsection