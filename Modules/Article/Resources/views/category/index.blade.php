@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            栏目列表
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="/article/category">栏目列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article/category/create">添加栏目</a>
            </li>
        @endslot
        @slot('body')
            <p class="card-text">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名称</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category['id']}}</th>
                        <td>{!! $category['_name'] !!}</td>
                        <td>{{$category['created_at']}}</td>
                        <td>
                            <div class="btn-group btn-space">
                                <a href="/article/category/{{$category['id']}}/edit" class="btn btn-secondary">编辑</a>
                                <button type="button" class="btn btn-secondary" onclick="categoryDestroy(this)">删除</button>
                                <form action="/article/category/{{$category['id']}}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function categoryDestroy(fn){
            if(confirm('确定删除栏目？')){
                $(fn).next('form').trigger('submit');
            }
        }
    </script>
@endsection