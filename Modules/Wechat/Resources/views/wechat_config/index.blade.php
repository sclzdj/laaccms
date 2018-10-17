@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">微信配置</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/wechat/wechat_config" class="nav-link active">微信配置</a></li>
        </ul>
        <form action="/wechat/wechat_config" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="form-group row">
                    <label for="token" class="col-12 col-sm-3 col-form-label text-md-right">token</label>
                    <div class="col-12 col-md-9">
                        <input id="token" name="token" type="text"
                               value="{{ $wechat_config['token']??old('token') }}"
                               class="form-control form-control-sm}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="encodingaeskey" class="col-12 col-sm-3 col-form-label text-md-right">encodingaeskey</label>
                    <div class="col-12 col-md-9">
                        <input id="encodingaeskey" name="encodingaeskey" type="text"
                               value="{{ $wechat_config['encodingaeskey']??old('encodingaeskey') }}"
                               class="form-control form-control-sm}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="appid" class="col-12 col-sm-3 col-form-label text-md-right">appid</label>
                    <div class="col-12 col-md-9">
                        <input id="appid" name="appid" type="text"
                               value="{{ $wechat_config['appid']??old('appid') }}"
                               class="form-control form-control-sm}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="appsecret" class="col-12 col-sm-3 col-form-label text-md-right">appsecret</label>
                    <div class="col-12 col-md-9">
                        <input id="appsecret" name="appsecret" type="text"
                               value="{{ $wechat_config['appsecret']??old('appsecret') }}"
                               class="form-control form-control-sm}}">
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存提交</button>
            </div>
        </form>
    </div>
@endsection
