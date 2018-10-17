@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">模块管理</div>
        <div class="tab-container">
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item"><a href="/admin/module" class="nav-link active">模块列表</a></li>
                <li class="nav-item"><a href="/admin/module/create" class="nav-link">添加模块</a></li>
                <li class="nav-item"><a href="/admin/module_update_cache" class="nav-link">更新模块缓存</a></li>
            </ul>
            <div class="card card-contrast card-border-color-success">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>标识</th>
                            <th>默认模块</th>
                            <th>前台访问</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{!! $d['id'] !!}</td>
                                <td>{!! $d['title'] !!}</td>
                                <td>{!! $d['name'] !!}</td>
                                <td>{!! $d['is_default']?"是":"否" !!}</td>
                                <td>{!! $d['front_access']?"是":"否" !!}</td>
                                <td>
                                    @if($d['is_default']=='0' && $d['front_access']=='1')
                                        <a href="/admin/module_set_default/{{$d['id']}}"
                                           class="btn btn-secondary">设为默认</a>
                                    @elseif($d['is_default']=='1' && $d['front_access']=='1')
                                        <a href="#" class="btn btn-success disabled">已为默认</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

