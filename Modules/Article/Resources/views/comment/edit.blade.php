@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">评论管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/article/comment" class="nav-link">评论列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">修改评论</a></li>
        </ul>
        <form action="/article/comment/{{$comment['id']}}" method="post">
            <div class="card-body card-body-contrast">
                @csrf @method('PUT')
                
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存更新</button>
            </div>
        </form>
    </div>
@endsection
