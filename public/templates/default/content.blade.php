@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{asset('templates/default/css/index.css')}}">
    <link href="https://cdn.bootcss.com/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/Swiper/4.3.0/js/swiper.min.js"></script>
@endsection
@section('content')
    <div class="container">
        @include('layouts._message')
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        {{$content['title']}}
                    </div>
                    <div class="card-body">
                        {!! $content['content'] !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        热门文章
                    </div>
                    <div class="card-block">
                        <ul class="list-group">
                            @lists(['is_hot'=>1])
                            <a href="{{$item['url']}}">
                                <li class="list-group-item">{{$item['title']}}</li>
                            </a>
                            @endlists
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class=" col-sm-9">
                <div class="card">
                    <div class="card-header">
                        评论列表
                    </div>
                    <div class="card-block">
                        <ul class="list-group">
                            @foreach($content->comments as $comment)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            {{$comment['content']}}
                                        </div>
                                        <div class="col-sm-3">
                                            <small class="text-secondary">{{$comment->user->name}}
                                                &nbsp;/&nbsp;{{$comment->created_at->diffForHumans()}}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        @guest
                            <div class="text-center">
                                <a href="/login" class="btn btn-primary">请登录后发表评论</a>
                            </div>
                        @else
                            <form action="/article/comment" method="post">
                                @csrf
                                <input type="hidden" name="content_id" value="{{$content['id']}}">
                                <div class="form-group">
                                    <textarea class="form-control" name="content" placeholder="请输入评论"
                                              rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="form-control" type="submit">提交</button>
                                </div>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection