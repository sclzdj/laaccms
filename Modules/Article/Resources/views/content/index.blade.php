@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            文章列表
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="/article/content">文章列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article/content/create">添加文章</a>
            </li>
        @endslot
        @slot('body')
            <p class="card-text">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">标题</th>
                    <th scope="col">栏目</th>
                    <th scope="col">作者</th>
                    <th scope="col">缩略图</th>
                    <th scope="col">置顶</th>
                    <th scope="col">查看次数</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <th scope="row">{{$item['id']}}</th>
                        <td>{{$item['title']}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item['author']}}</td>
                        <td>
                            @if($item['thumb']!=='')
                                <a href="{{$item['thumb']}}" target="_blank"><img src="{{$item['thumb']}}" class="img-thumbnail"
                                     style="max-width: 50px;max-height: 50px;padding:0;"></a>
                            @endif
                        </td>
                        <td>{{$item['is_top']?'是':'否'}}</td>
                        <td>{{$item['click']}}</td>
                        <td>{{$item['created_at']}}</td>
                        <td>
                            <div class="btn-group btn-space">
                                <a href="/article/content/{{$item['id']}}/edit" class="btn btn-secondary">编辑</a>
                                <button type="button" class="btn btn-secondary" onclick="contentDestroy(this)">删除
                                </button>
                                <form action="/article/content/{{$item['id']}}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
            <p class="card-text">
                {!! $data->links() !!}
            </p>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function contentDestroy(fn) {
            if (confirm('确定删除栏目？')) {
                $(fn).next('form').trigger('submit');
            }
        }
    </script>
@endsection