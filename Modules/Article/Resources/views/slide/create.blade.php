@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">轮播图管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/article/slide" class="nav-link">轮播图列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">添加轮播图</a></li>
        </ul>
        <form action="/article/slide" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="form-group row">
    <label for="title" class="col-12 col-sm-3 col-form-label text-md-right">标题</label>
    <div class="col-12 col-md-9">
        <input id="title" name="title" type="text"
               value="{{ $slide['title']??old('title') }}"
               class="form-control form-control-sm form-control">
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-12 col-sm-3 col-form-label text-md-right">链接地址</label>
    <div class="col-12 col-md-9">
        <input id="url" name="url" type="text"
               value="{{ $slide['url']??old('url') }}"
               class="form-control form-control-sm form-control">
    </div>
</div>
<div class="form-group row">
    <label for="pic" class="col-12 col-sm-3 col-form-label text-md-right">图片</label>
    <div class="col-12 col-lg-9">
        <hd-image name="pic" id="pic" image-url="{!! $slide['pic'] !!}"></hd-image>
    </div>
</div>
<div class="form-group row">
    <label for="status" class="col-12 col-sm-3 col-form-label text-md-right" style="padding-top:initial;">状态</label>
    <div class="col-12 col-md-9">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           {{$slide['status']=='1'?'checked':''}}
                           name="status" value="1"
                           id="status-1">
                    <label class="form-check-label" for="status-1">开启</label>
           </div>            <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           {{$slide['status']=='0'?'checked':''}}
                           name="status" value="0"
                           id="status-0">
                    <label class="form-check-label" for="status-0">关闭</label>
           </div>
    </div>
</div>

            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存提交</button>
            </div>
        </form>
    </div>
@endsection
