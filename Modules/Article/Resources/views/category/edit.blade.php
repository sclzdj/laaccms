@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            添加栏目
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link" href="/article/category">栏目列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article/category/create">添加栏目</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">编辑栏目</a>
            </li>
        @endslot
        @slot('body')
            <form action="/article/category/{{$category['id']}}}" method="post">
                @csrf @method('PUT')
                <p class="card-text">
                <div class="form-group">
                    <label for="exampleInputEmail1">栏目名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="栏目名称" name="name"
                           value="{{$category['name']}}">
                    <small id="emailHelp" class="form-text text-muted">必填，长度2-30位</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">父级栏目</label>
                    <select class="form-control custom-select" id="exampleInputPassword1" name="pid">
                        <option value="0">顶级栏目</option>
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}" {{$category['_selected']?'selected':''}} {{$category['_disabled']?'disabled':''}}>{!! $category['_name'] !!}</option>
                        @endforeach
                    </select>
                    <small id="emailHelp" class="form-text text-muted">必选</small>
                </div>
                </p>
                <p class="card-text">
                    <button type="submit" class="btn btn-primary">保存</button>
                </p>
            </form>
        @endslot
    @endcomponent
@endsection