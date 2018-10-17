@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            添加文章
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link" href="/article/content">文章列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article/content/create">添加文章</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">编辑文章</a>
            </li>
        @endslot
        @slot('body')
            <form action="/article/content/{{$content['id']}}}" method="post">
                @csrf @method('PUT')
                <p class="card-text">
                <div class="form-group">
                    <label style="display: block;">文章标题</label>
                    <input class="form-control" name="title" value="{{$content['title']}}" placeholder="文章标题">
                    <small class="form-text text-muted">必填，长度1-100位</small>
                </div>
                <div class="form-group">
                    <label style="display: block;">栏目</label>
                    <select class="form-control custom-select" name="category_id">
                        <option value="">请选择栏目</option>
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}" {{$content['category_id']==$category['id']?'selected':''}}>{!! $category['_name'] !!}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">必选</small>
                </div>
                <div class="form-group">
                    <label style="display: block;">作者</label>
                    <input class="form-control" name="author" value="{{$content['author']}}" placeholder="作者">
                    <small class="form-text text-muted">长度1-100位</small>
                </div>
                <div class="form-group">
                    <label style="display: block;">缩略图</label>
                    <hd-image name="thumb" image-url="{{$content['thumb']}}" allow-szie="3"></hd-image>
                    <small class="form-text text-muted">必传，最大3MB</small>
                </div>
                <div class="form-group">
                    <label style="display: block;">内容</label>
                    <hd-simditor name="content" url="/upload-simditor">{{$content['content']}}</hd-simditor>
                    <small class="form-text text-muted">必填</small>
                </div>
                <div class="form-group">
                    <label style="display: block;">置顶</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_top1" name="is_top" value="1" {{$content['is_top']==1?'checked':''}} class="custom-control-input">
                        <label class="custom-control-label" for="is_top1">是</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_top2" name="is_top" value="0" {{$content['is_top']==0?'checked':''}} class="custom-control-input">
                        <label class="custom-control-label" for="is_top2">否</label>
                    </div>
                </div>
                </p>
                <p class="card-text">
                    <button type="submit" class="btn btn-primary">保存</button>
                </p>
            </form>
        @endslot
    @endcomponent
@endsection
