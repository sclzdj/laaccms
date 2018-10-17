@extends('admin::layouts.master')
@section('content')
    @component('components.tabls')
        @slot('title')
            模板列表
        @endslot
        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="/admin/template">模板列表</a>
            </li>
        @endslot
        @slot('body')
            @foreach($templates as $template)
                <div class="card col-sm-3" style="float:left;">
                    <div class="card-block"
                         style="width: 100%;background: #eee;height: 30px;line-height: 30px;text-align: center;">
                        {{$template['title']}}
                    </div>
                    <div class="card-block">
                        <img src="{{$template['preview']}}" class="img-thumbnail" style="width: 100%;height: 300px;">
                    </div>
                    @if(\HDModule::config('admin.config.defaultTemplateName')==$template['name'])
                        <a class="btn btn-success disabled" href="#"
                           style="display: block;width: 100%;height: 30px;line-height: 30px;">已为默认模板</a>
                    @else
                        <a class="btn btn-primary" href="/admin/template/set/{{$template['name']}}"
                           style="display: block;width: 100%;height: 30px;line-height: 30px;">设为默认模板</a>
                    @endif
                </div>
            @endforeach
            <div class="clearfix"></div>
        @endslot
    @endcomponent
@endsection
