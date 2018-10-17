@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @include('layouts._message')
                <div class="card">
                    <div class="card-header">
                        系统提示
                    </div>
                    <div class="card-body">
                        请先验证邮件
                    </div>
                    <div class="card-footer text-muted">
                        <a href="/user/emailSend" class="btn btn-primary">重新发送邮件</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection